<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8156c29ed22da855c4d66899fadafc28
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPackio\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPackio\\' => 
        array (
            0 => __DIR__ . '/..' . '/wpackio/enqueue/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8156c29ed22da855c4d66899fadafc28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8156c29ed22da855c4d66899fadafc28::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8156c29ed22da855c4d66899fadafc28::$classMap;

        }, null, ClassLoader::class);
    }
}