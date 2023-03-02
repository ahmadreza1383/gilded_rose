<?php
namespace System\Modules;

class SearchFileModule
{
    private $files = [];

    public function __construct(array $paths)
    {
        $this->search($paths);
    }

    public function get()
    {
        return $this->files;
    }

    private function search(array $paths)
    {
        foreach($paths as $path)
        {
            $files = removeDirMark(scandir($path));

            foreach($files as $file)
            {
                array_push($this->files, $this->isNotDir($path.DIRECTORY_SEPARATOR.$file));
            }
        }
    }

    private function isNotDir($path)
    {
        if(is_dir($path)) return '';
        
        return $path;
    }
}