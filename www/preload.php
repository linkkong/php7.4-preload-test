<?php
$files = [
    __DIR__ . '/Dog/AnimalInterface.php',
    __DIR__ . '/Dog/Dog.php',
    __DIR__ . '/Dog/DogTrait.php',
    __DIR__ . '/dog.php',
];
var_dump($files);
foreach ($files as $file) {

    if (opcache_compile_file($file)) {
        echo "Preloading $file success" . PHP_EOL;
    } else {
        echo "Preloading $file failed" . PHP_EOL;
    }
}
require __DIR__ . "/laravel_preload.php";