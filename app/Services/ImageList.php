<?php

declare(strict_types=1);

namespace App\Services;

use App\ImageData;
use Psr\Log\LoggerInterface;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Filesystem\Factory;

final readonly class ImageList
{
    public function __construct(
        private Repository $config,
        private Factory $filesystemFactory,
        private LoggerInterface $logger,
    ) {}

    public function getImages(): Collection
    {
        $disk        = $this->filesystemFactory->disk($this->config->get('placephant.image_disk', 'public'));
        $imageDir    = $this->config->get('placephant.image_dir');
        $validImages = new Collection;

        foreach ($this->config->get('placephant.images', []) as $name => $imageConfig) {
            if (!isset($imageConfig['filename'])) {
                $this->logger->warning('We are missing the filename for an image ', [
                    'imageConfig' => $imageConfig,
                ]);

                continue;
            }

            $imageConfig['path'] = $imageDir . DIRECTORY_SEPARATOR . $imageConfig['filename'];

            if (!$disk->exists($imageConfig['path'])) {
                $this->logger->warning('We are missing the file for an image ', [
                    'imageConfig' => $imageConfig,
                ]);

                continue;
            }

            $validImages->put($name, ImageData::createFromArray($imageConfig));
        }

        return $validImages;
    }
}
