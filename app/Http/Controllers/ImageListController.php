<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ImageList;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Config\Repository;

final class ImageListController
{
    public function __invoke(ImageList $imageList, Repository $config, Factory $viewFactory): View
    {
        return $viewFactory->make('imagelist')
            ->with('imagelist', $imageList->getImages())
            ->with('config', $config->get('placephant.default_image_config'));
    }
}
