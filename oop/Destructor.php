<?php
class Fruit
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        echo "Fruit object created.<br>Fruit name: " . $this->name . "<br>";
    }

    public function __destruct()
    {
        echo "Fruit object destroyed.<br>";
    }
}

$fruit = new Fruit("Mango");;
