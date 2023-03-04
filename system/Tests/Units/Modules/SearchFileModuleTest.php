<?php 
namespace System\Tests\Units\Modules;

use System\Modules\Search\SearchFileModule;

class SearchFileModuleTest
{
    const DIRPATH =  __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..";
    public function SuccessFullyTest()
    {
        $response = (new SearchFileModule([self::DIRPATH]))->get();
        
        assert($response[0] == self::DIRPATH.DIRECTORY_SEPARATOR."Application.php");
    }

    

}