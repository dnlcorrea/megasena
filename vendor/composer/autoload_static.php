<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf04602d6b6df9ea5ee61b10ff69fbfb
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitaf04602d6b6df9ea5ee61b10ff69fbfb::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
