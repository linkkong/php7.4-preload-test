<?php

namespace MyPet {
    Interface AnimalInterface
    {
    }

    Trait DogTrait
    {
        public function bark()
        {
            return "Wang! Wang! from dog.php" . PHP_EOL;
        }
    }

    class Dog implements AnimalInterface
    {
        use DogTrait;

        public function run()
        {
            echo "It is running from dog . php" . PHP_EOL;
        }
    }
}

namespace {
    $dog = new Dog();
    $dog->run();
    echo $dog->bark();
}
