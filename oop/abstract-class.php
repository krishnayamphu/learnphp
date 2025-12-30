<?php
abstract class Vehicle
{
    public $model;
}
class Bike extends Vehicle {}

$bike = new Bike();
$bike->model = "Yamaha";
echo $bike->model;
