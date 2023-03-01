<?php
namespace System\Modules;

class SearchFiles
{
    public $files = [];

    public function __construct(array $paths)
    {
        $this->search($paths);
    }

    public function get()
    {
        return $this->soft($this->files);
    }

    private function search(array $paths)
    {
        foreach($paths as $path)
        {
            $files = $this->removeDirMark(scandir($path));

            foreach($files as $file)
            {
                array_push($this->files, $path.DIRECTORY_SEPARATOR.$file);
            }
        }
    }

    private function removeDirMark(array $array)
    {
        return array_diff($array, array('..', '.'));
    }

    private function soft(array $array)
    {
        $array = $this->filter($array);

        return str_replace('.php', '', $array);
    }

    private function filter(array $array)
    {
        return array_filter($array, function($item){
            return (strpos($item, '.php'));
        });
    }
}