<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e079609de46399a413923d5520d739d
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wapmorgan\\Mp3Info\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wapmorgan\\Mp3Info\\' => 
        array (
            0 => __DIR__ . '/..' . '/wapmorgan/mp3info/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e079609de46399a413923d5520d739d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e079609de46399a413923d5520d739d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}