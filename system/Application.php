<?php 
namespace System;

require __DIR__.DIRECTORY_SEPARATOR."helpers.php";

use System\Providers\TestServiceProvider;

class Application
{    
    public function up()
    {
        (new TestServiceProvider)->load();
    }
}