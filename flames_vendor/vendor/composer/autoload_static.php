<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d3deef16764ab03bee4ce1b905255f4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'App\\classes\\flames' => __DIR__ . '/../..' . '/classes/flames.php',
        'App\\flames' => __DIR__ . '/../..' . '/flames.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d3deef16764ab03bee4ce1b905255f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d3deef16764ab03bee4ce1b905255f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d3deef16764ab03bee4ce1b905255f4::$classMap;

        }, null, ClassLoader::class);
    }
}
