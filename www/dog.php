<?php

interface AnimalInterface
{
    public function run();
}

trait DogTrait
{
    public function bark()
    {
        return "Wang! Wang!";
    }
}

class Dog implements AnimalInterface
{
    use DogTrait;

    public function run()
    {
        echo "It is running";
    }
}

$dog = new Dog();
$dog->run();
echo $dog->bark();