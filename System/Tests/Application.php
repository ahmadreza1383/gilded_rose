<?php
namespace System\Tests;

require __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."helpers.php";

use System\Tests\Units\Modules\SearchFileModuleTest;

class Application
{
    public function up()
    {
        (new SearchFileModuleTest)->SuccessFullyTest();
    }
}   
