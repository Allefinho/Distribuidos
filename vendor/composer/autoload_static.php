<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit117b6a6ea24c90a9249ec0d18829f03f
{
    public static $prefixesPsr0 = array (
        'U' => 
        array (
            'Unirest\\' => 
            array (
                0 => __DIR__ . '/..' . '/mashape/unirest-php/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit117b6a6ea24c90a9249ec0d18829f03f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
