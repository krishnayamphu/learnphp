<?php

class Animal
{
    protected $name;
    public function eat($food)
    {
        echo $this->name . " is eating " . $food . "<br>";
    }
}

class Dog extends Animal
{
    public function init()
    {
        $this->name = "Buddy";
    }
}

$dog = new Dog;
//$dog->name = "Max"; // This will not work as $name is protected
$dog->init();
$dog->eat("bone");
