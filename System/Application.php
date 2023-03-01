<?php 
namespace System;

use System\Providers\TestServiceProvider;

class Application
{    
    public function up()
    {
        (new TestServiceProvider)->load();
        
        echo "The tests were run successfully\n";
    }
}