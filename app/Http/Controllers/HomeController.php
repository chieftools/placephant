<?php

namespace App\Http\Controllers;

use App\Services\ImageList;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(ImageList $imageList, Repository $config, Factory $viewFactory): View
    {
        return $viewFactory->make('welcome')
            ->with('imagelist', $imageList->getImages())
            ->with('config', $config->get('placephant.default_image_config'));
    }
}
