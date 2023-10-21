<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbcccb4912e9b1b6d5e2cbc8f2d7ec4fe::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
