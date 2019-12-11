<?php

require 'AnimalInterface.php';
require 'DogTrait.php';

class Dog implements AnimalInterface
{
    use DogTrait;

    public function run()
    {
        echo "It is running";
    }
}