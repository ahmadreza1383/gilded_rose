<?php 
namespace System\Providers;

use System\Loader\ClassLoader;

class TestServiceProvider
{
    public const DIRPATH = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;

    public function load()
    {
        return (new ClassLoader(self::DIRPATH."tests".DIRECTORY_SEPARATOR."Units"))->load();
    }
}