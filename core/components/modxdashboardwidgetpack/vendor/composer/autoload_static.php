<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9bf65974d0feecbaecb552a62acdb78f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Sterc\\MODXDashboardWidgetPack\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Sterc\\MODXDashboardWidgetPack\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9bf65974d0feecbaecb552a62acdb78f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9bf65974d0feecbaecb552a62acdb78f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9bf65974d0feecbaecb552a62acdb78f::$classMap;

        }, null, ClassLoader::class);
    }
}