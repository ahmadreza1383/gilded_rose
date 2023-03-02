<?php 
namespace System\Tests\Units\Modules;

use System\Application;
use System\Modules\SearchFileModule;
use System\Providers\TestServiceProvider;

class SearchFileModuleTest
{
    const DIRPATH =  __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..";
    public function SuccessFullyTest()
    {
        $response = (new SearchFileModule([self::DIRPATH]))->get();
        
        assert($response[0] == '/mnt/System/Tests/Units/Modules/../../Application.php');
    }

}