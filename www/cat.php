<?php


interface CatInterface
{
    public function run();
}

trait CatTrait
{
    public function bark()
    {
        return "Miao! Miao!";
    }
}

class Cat implements CatInterface
{
    use CatTrait;

    public function run()
    {
        echo "It is running";
    }
}

$dog = new Cat();
$dog->run();
echo $dog->bark();