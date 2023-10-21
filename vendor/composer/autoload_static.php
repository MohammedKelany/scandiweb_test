<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe
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
            0 => __DIR__ . '/../..' . '/private',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe::$classMap;

        }, null, ClassLoader::class);
    }
}
