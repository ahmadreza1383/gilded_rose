<?php
require 'autoload.php';

class Main
{    
    public function up()
    {
        $this->load();

        echo "Test success\n";
    }

    private function load()
    {
        foreach($this->getMethods() as $item)
        {
            $class = new $item['class'];
            $index = 0;

            do {  
                $method = $item['methods'][$index];
                $class->$method();
                $index++;
            } while ($index <  count($item['methods']));
        }
    }

    private function getTestsFiles()
    {
        $list = scandir(__DIR__.DIRECTORY_SEPARATOR."tests");

        $list = array_filter($list, function($i){
            return $i != '.' &&
            $i != '..' &&
            $i != 'TestBase.php';
        });

        return $list;
    }

    private function getTests()
    {
       return str_replace('.php', '', $this->getTestsFiles());
    }

    private function getMethods()
    {
        $result = [];

        foreach($this->getTests() as $test)
        {
            $class = "tests\\$test";
            $f = new ReflectionClass($class);
            $methods = [];

            foreach ($f->getMethods() as $m) {
                if ($m->class == $class) 
                $methods[] = $m->name;  
            }

            array_push($result, ['class' => $class, 'methods' => $methods]);
        }

        return $result;
    }
}

$gilded = new Main();
$gilded->up();