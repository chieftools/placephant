<?php

declare(strict_types=1);

namespace App;

final class ImageData
{
    public function __construct(
        public readonly string $author,
        public readonly string $description,
        public readonly string $filename,
        public readonly string $path,
    ) {
    }

    public static function createFromArray(array $data): ImageData
    {
        return new ImageData(
            $data['author'] ?? 'Unknown',
            $data['description'] ?? '',
            $data['filename'],
            $data['path'],
        );
    }
}
