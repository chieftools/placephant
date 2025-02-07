<?php

declare(strict_types=1);

namespace App\Services;

use App\ImageData;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Collection;
use Psr\Log\LoggerInterface;

final class ImageList
{
    public function __construct(private readonly Repository $config, private readonly Factory $filesystemFactory, private LoggerInterface $logger)
    {
    }

    public function getImages(): Collection
    {
        $disk = $this->filesystemFactory->disk($this->config->get('placephant.image_disk', 'public'));
        $imageDir = $this->config->get('placephant.image_dir');
        $validImages = new Collection();
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
        if ($validImages->isEmpty()) {
            $this->logger->error('We have no valid images ', [
                'existing_config' => $this->config->get('placephant.images', []),
            ]);
        }

        return $validImages;
    }
}
