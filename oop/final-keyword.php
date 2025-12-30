<?php
// final class Shape
class Shape
{
    public final function draw()
    {
        echo "Drawing a shape";
    }
}

class Circle extends Shape
{
    // public function draw()
    // {
    //     echo "Drawing a circle shape";
    // }
}


$circle = new Circle();
$circle->draw();
