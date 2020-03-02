<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9022ca29f2c694f21ec5bd8f6eb7ef0d
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dwoo\\' => 5,
        ),
        'A' => 
        array (
            'App\\System\\' => 11,
            'App\\Model\\Quiz\\' => 15,
            'App\\Model\\' => 10,
            'App\\Database\\' => 13,
            'App\\Controller\\' => 15,
            'App\\Config\\' => 11,
            'App\\Authentication\\' => 19,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dwoo\\' => 
        array (
            0 => __DIR__ . '/..' . '/dwoo/dwoo/lib/Dwoo',
        ),
        'App\\System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/system',
        ),
        'App\\Model\\Quiz\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/model/quiz',
        ),
        'App\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/model',
        ),
        'App\\Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/database',
        ),
        'App\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controller',
        ),
        'App\\Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/config',
        ),
        'App\\Authentication\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/authentication',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9022ca29f2c694f21ec5bd8f6eb7ef0d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9022ca29f2c694f21ec5bd8f6eb7ef0d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}