<?php
$files = [
    './Dog/AnimalInterface.php',
    './Dog/Dog.php',
    './Dog/DogTrait.php',
];

foreach ($files as $file) {
    opcache_compile_file($file);
}