<?php 
namespace System\Providers;

use System\Modules\SearchFiles;
use System\Modules\SearchDirectory;

class TestServiceProvider
{
    const DIRPATH = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."tests/Units";

    public function load()
    {
        $directories = new SearchDirectory(self::DIRPATH);

        var_dump((new SearchFiles($directories->get()))->get());
    }
}