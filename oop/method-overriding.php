<?php

class Shape
{
    public function draw()
    {
        echo "Drawing a shape";
    }
}

class Circle extends Shape
{
    public function draw()
    {
        echo "Drawing a circle shape";
    }
}


$circle = new Circle();
$circle->draw();
