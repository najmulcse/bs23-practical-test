<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit0ad0417a2776d7a5c51eea6e8e4b2fb0
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

        spl_autoload_register(array('ComposerAutoloaderInit0ad0417a2776d7a5c51eea6e8e4b2fb0', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit0ad0417a2776d7a5c51eea6e8e4b2fb0', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit0ad0417a2776d7a5c51eea6e8e4b2fb0::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
