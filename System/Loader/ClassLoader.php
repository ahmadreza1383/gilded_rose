<?php
namespace System\Loader;

use System\Modules\SearchDirectoryModule;
use System\Modules\SearchFileModule;
use System\Providers\TestServiceProvider;

class ClassLoader
{
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function load()
    {   
        foreach($this->files() as $file)
        {
            $class = convertSlashToBackslash(str_replace(TestServiceProvider::DIRPATH, '', $file));
            var_dump($class);
        }
    }

    public function files()
    {
        $files = (new SearchFileModule(
            (new SearchDirectoryModule($this->path))->get())
        )->get();

        //Remove type php files
        return removeDotPhp($files);
    }
}