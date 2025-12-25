<?php
class Car
{
    public $model; //field/property/member variable
    public $color;

    public function start() //method/function
    {
        echo "Car is starting";
    }

    public function getMaxSpeed()
    {
        return 200;
    }
    public function changeGear($number)
    {
        echo "Changing to gear: " . $number;
    }
}

$bmw = new Car;
$bmw->model = "BMW X5";
$bmw->color = "Blue and White";

echo $bmw->model;
echo "<br>" . $bmw->color;
echo "<br>";
$bmw->start(); //calling (invoking) method

echo "<br>Max speed is: " . $bmw->getMaxSpeed();
echo "<br>";
$bmw->changeGear(3);

$audi = new Car;
$audi->model = "Audi Q7";
$audi->color = "Black";
echo "<br>" . $audi->model;
echo "<br>" . $audi->color;
echo "<br>";
$audi->start(); //calling (invoking) method
echo "<br>Max speed is: " . $audi->getMaxSpeed();
echo "<br>";
$audi->changeGear(2);
