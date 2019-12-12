<?php

function get_allfiles($path, &$files)
{
    if (is_dir($path)) {
        $dp = dir($path);
        while ($file = $dp->read()) {
            if ($file != "." && $file != "..") {
                get_allfiles($path . "/" . $file, $files);
            }
        }
        $dp->close();
    }
    if (is_file($path)) {
        $files[] = $path;
    }
}

function get_filenamesbydir($dir)
{
    $files = array();
    get_allfiles($dir, $files);
    return $files;
}

echo __DIR__ . "/laravel/vendor/laravel";
$filenames = get_filenamesbydir(__DIR__ . "/laravel/vendor/laravel");
//打印所有文件名，包括路径
foreach ($filenames as $value) {
    if (strpos($value, '.php') !== false) {
        opcache_compile_file($file);
    }
//    echo $value . "<br />";
}

