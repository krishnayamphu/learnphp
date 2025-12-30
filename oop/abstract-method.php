<?php
abstract class Vehicle
{
    //abstract method
    public abstract function start();
}
class Bike extends Vehicle
{
    //implementing abstract method
    public function start()
    {
        echo "Bike starting...";
    }
}

$bike = new Bike();
$bike->start();
