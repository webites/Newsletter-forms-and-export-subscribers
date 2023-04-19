<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit970be8d985b13f0a53da50a1562763b1
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Newsletter\\Core\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Newsletter\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit970be8d985b13f0a53da50a1562763b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit970be8d985b13f0a53da50a1562763b1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit970be8d985b13f0a53da50a1562763b1::$classMap;

        }, null, ClassLoader::class);
    }
}