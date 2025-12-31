<?php
class Mobile
{
    public $model;
    public static function getBrand()
    {
        echo "Brand: Apple<br>";
    }
}


$iphone14 = new Mobile();
$iphone14->model = "iPhone 14 Pro Max";

echo "Mobile Model: " . $iphone14->model . "<br>";
Mobile::getBrand();


$iphone16 = new Mobile();
$iphone16->model = "iPhone 16 Pro Max";

echo "Mobile Model: " . $iphone16->model . "<br>";
Mobile::getBrand();
