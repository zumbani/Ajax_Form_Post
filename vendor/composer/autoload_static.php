<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0f073a241f9bdecd5b8ab9684562c04b
{
    public static $files = array (
        '71ecd0286a4e74fd8732297fb587023c' => __DIR__ . '/..' . '/thingengineer/mysqli-database-class/MysqliDb.php',
        'd383f1ec7b1e54a09cb53eb6fcf751e0' => __DIR__ . '/..' . '/thingengineer/mysqli-database-class/dbObject.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rakit\\Validation\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rakit\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/rakit/validation/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0f073a241f9bdecd5b8ab9684562c04b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0f073a241f9bdecd5b8ab9684562c04b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0f073a241f9bdecd5b8ab9684562c04b::$classMap;

        }, null, ClassLoader::class);
    }
}
