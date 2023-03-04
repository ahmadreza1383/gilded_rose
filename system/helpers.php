<?php

    if (! function_exists('convertSlashToBackslash')) {
        function convertSlashToBackslash(string $path) 
        {
            return str_replace("/", "\\", $path);
        }
    }

    if(! function_exists('removeDirMark')) {
        function removeDirMark(array $array)
        {
            return array_diff($array, array('..', '.'));
        }
    }

    if(! function_exists('removeDotPhp')) {
        function removeDotPhp(array $items)
        {
            $result = [];

            $items = filterPhpFile($items);

            foreach($items as $item)
                array_push($result, substr($item[0], 0, -4));

            return $items;
        }
    }

    if(! function_exists('filterPhpFile')){
        function filterPhpFile(array $items)
        {
            return  array_filter($items, function($item){
                return ( substr($item, -4) == ".php");
            });   
        }
    }
?>
