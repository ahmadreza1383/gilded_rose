<?php
namespace System\Modules;

class SearchDirectory
{
    private $directories = [];

    public function __construct($basePath)
    {
        $this->currentPath($basePath);
    }

    private function currentPath($path)
    {
        if($this->checkDir($path))
            $this->addDirectory($path);
    }

    public function get()
    {
        return $this->directories;
    }

    private function removeDirMark(array $array)
    {
        return array_diff($array, array('..', '.'));
    }

    private function scanDirectory($path)
    {
        return $this->removeDirMark(scandir($path));
    }

    private function checkDir($path)
    {
        return is_dir($path);
    }

    private function search($path)
    {
        foreach($this->scanDirectory($path) as $file)
        {
            $file = $path.DIRECTORY_SEPARATOR.$file;
            if($this->checkDir($file))
                $this->addDirectory($file);
        }
    }

    private function addDirectory($path)
    {
        array_push($this->directories, $path);

        $this->search($path);
    }
}