<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\ImageData;
use App\Services\ImageList;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Http\Request;
use League\Glide\Responses\SymfonyResponseFactory;
use League\Glide\ServerFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class ImageController
{
    public function __construct(
        private readonly Repository $config,
        private readonly ImageList $imageList,
        private readonly Factory $filesystemFactory
    ) {
    }

    public function __invoke(Request $request): StreamedResponse
    {
        /**
         * Example paths from original project
         * 100 squared image
         * 300/250 image with width and height
         * g/100/200 image in black and white
         * 100/200?filter=bw image in black and white
         * 300/250?filter=sepia image in sepia
         *
         * Not supported from the original project
         * v/100/200 verbose mode, show the dimension on a black and white image
         *
         * Additional option
         * ?name=<imagename> use the image with the specified name
         */
        $imageConfig = $this->getConfig($request);
        $imageData = $this->getRandomImage($request->get('name'));

        return $this->processImage($imageData, $imageConfig);
    }

    private function processImage(ImageData $imageData, array $imageConfig)
    {
        $server = ServerFactory::create([
            'response' => new SymfonyResponseFactory(),
            'source' => $this->filesystemFactory->disk($this->config->get('placephant.image_disk', 'public'))->getDriver(),
            'cache' => $this->filesystemFactory->disk()->getDriver(),
        ]);
        $params = [
            'fit' => 'crop',
        ];
        $params = $this->updateFitInParams($imageConfig, $params);
        $params = $this->setSizeInParams($imageConfig, $params);
        if (isset($imageConfig['filter'])) {
            if (in_array($imageConfig['filter'], ['g', 'bw', 'greyscale'], true)) {
                $params['filt'] = 'greyscale';
            }
            if ($imageConfig['filter'] === 'sepia') {
                $params['filt'] = 'sepia';
            }
        }

        return $server->getImageResponse($imageData->path, $params);
    }

    private function getConfig(Request $request): array
    {
        $imageConfig = $this->config->get('placephant.default_image_config', []);
        $imageConfig['filter'] = $request->query('filter', $imageConfig['filter']);
        $imageConfig['fit'] = $request->query('fit', $imageConfig['fit']);

        $sizeParts = explode('/', $request->path());
        array_filter($sizeParts);

        if (count($sizeParts) === 0) {
            return $imageConfig;
        }

        if (!is_numeric($sizeParts[0])) {
            $imageConfig['filter'] = array_shift($sizeParts);
        }

        if (!isset($sizeParts[0]) || !is_numeric($sizeParts[0])) {
            return $imageConfig;
        }
        $imageConfig['width'] = $sizeParts[0];

        if (isset($sizeParts[1]) && is_numeric($sizeParts[1])) {
            $imageConfig['height'] = $sizeParts[1];
        }
        // lower the width and height if they are above the max.
        if (($imageConfig['width'] ?? 0) > ($imageConfig['max_width'] ?? PHP_INT_MAX)) {
            $imageConfig['width'] = $imageConfig['max_width'];
        }
        if (($imageConfig['height'] ?? 0) > ($imageConfig['max_height'] ?? PHP_INT_MAX)) {
            $imageConfig['height'] = $imageConfig['max_height'];
        }

        return $imageConfig;
    }

    private function getRandomImage(?string $name): ImageData
    {
        $images = $this->imageList->getImages();
        if ($name !== null && $images->has($name)) {
            return $images->get($name);
        }

        return $images->random();
    }

    private function updateFitInParams(array $imageConfig, array $params): array
    {
        // See: https://glide.thephpleague.com/2.0/api/size//#fit-fit for the options
        if (in_array($imageConfig['fit'] ?? '', ['contain', 'max', 'fill', 'fill-max', 'stretch', 'crop'], true)) {
            $params['fit'] = $imageConfig['fit'];
        }

        return $params;
    }

    private function setSizeInParams(array $imageConfig, array $params): array
    {
        if (isset($imageConfig['width'])) {
            $params['w'] = $imageConfig['width'];
        }
        if (isset($imageConfig['height'])) {
            $params['h'] = $imageConfig['height'];
        }
        if (isset($params['w']) && !isset($params['h'])) {
            $params['h'] = $params['w'];
        }
        if ($params['w'] == 0) {
            // 0 means we keep the ratio, useful with fit options like stretch
            unset($params['w']);
        }
        if ($params['h'] == 0) {
            // 0 means we keep the ratio, useful with fit options like stretch
            unset($params['h']);
        }

        return $params;
    }
}
