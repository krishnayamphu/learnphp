<?php

class Animal
{
    public $name;
    public $color;

    public function eat($food)
    {
        echo $this->name . " is eating " . $food . "<br>";
    }
}

class Dog extends Animal
{
    public function bark()
    {
        echo $this->name . " says Woof! Woof!<br>";
    }

    public function info($name, $color)
    {
        $this->name = $name;
        $this->color = $color;

        echo "Dog Name: " . $this->name . "<br>";
        echo "Dog Color: " . $this->color . "<br>";
    }
}

$dog = new Dog;
$dog->info("Buddy", "Brown");
$dog->eat("bone");
$dog->bark();
