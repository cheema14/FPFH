<?php

return [
    'length' => 4, // Set the length of the captcha text to 4 characters
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'default' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
        'bgColor' => '#ffffff',
        'fontColors' => ['#212529'],
    ],
    'math' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
        'bgColor' => '#ffffff',
        'fontColors' => ['#212529'],
    ],

    'flat' => [
        'length' => 4,
        'width' => 160,
        'height' => 46,
        'quality' => 90,
        'lines' => 6,
        'bgImage' => false,
        'bgColor' => '#ffffff',
        'fontColors' => ['#212529'],
        'contrast' => -5,
    ],
    'mini' => [
        'length' => 4,
        'width' => 60,
        'height' => 32,
        'bgColor' => '#ffffff',
        'fontColors' => ['#212529'],
    ],
    'inverse' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => false,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
        'bgColor' => '#ffffff',
        'fontColors' => ['#212529'],
    ]
];
