<?php

declare(strict_types=1);

return [
    'image_dir' => 'elephpants',
    'image_disk' => 'public',

    'default_image_config' => [
        'width' => 500,
        'filter' => 'none',
        'fit' => 'crop',
        'max_width' => 5000,
        'max_height' => 5000,
    ],

    'images' => [
        'psr-8-elephpants' => [
            'filename' => 'psr-8.jpg',
            'author' => 'Tobias van Beek',
            'description' => 'The photo that I use for my PSR-8 cards.',
        ],
        'elephpants-circle' => [
            'filename' => 'circle.jpg',
            'author' => 'Tobias van Beek',
            'description' => 'A circle of ElePHPants.',
        ],
        'inphpinity-on-present' => [
            'filename' => 'inphpinity-on-present.jpg',
            'author' => 'Tobias van Beek',
            'description' => 'InPHPinity standing on a present.',
        ],
		
        'elephpant-in-the-hedge' => [
            'filename' => 'elephpant-in-the-hedge.jpg',
            'author' => 'Tobias van Beek',
            'description' => 'ElePHPant hidding in the hedge.',
        ],
        'luxy-in-the-sun' => [
            'filename' => 'luxy-in-the-sun.jpg',
            'author' => 'Tobias van Beek',
            'description' => 'Luxy enjoying the sun.',
        ],
    ],
];
