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
function preloadDir($dirs)
{
    $allFiles = [];
    foreach ($dirs as $dir) {
        $allFiles = array_merge($allFiles, get_filenamesbydir($dir));
    }
    //打印所有文件名，包括路径
    foreach ($allFiles as $value) {
        if (strpos($value, '.php') !== false) {
            if (opcache_compile_file($value)) {
                echo "Preloading $value success" . PHP_EOL;
            } else {
                echo "Preloading $value failed" . PHP_EOL;
            }
        }
    }
}

function src($folderNames)
{
    $dirs = [];
    foreach ($folderNames as $folderName) {
        $dirs[] = __DIR__ . "/laravel/vendor/laravel/framework/src/Illuminate/$folderName";
    }
    return $dirs;
}

/*
有问题的目录 ["Contracts" , "Database","Foundation","Redis","Routing", "Session"
, "Support", "Queue", "Validation","View" ]
 */

$dirs = src([
    'Auth', "Broadcasting", "Bus", 'Cache', 'Config', 'Console',
    "Containers", "Cookie", 'Encryption', "Events", 'FileSystem',
    "Hashing", 'Http', 'Log', 'Mail', "Notifications", 'Pagination',
    'Pipeline', 'Translation',
]);

preloadDir($dirs);

