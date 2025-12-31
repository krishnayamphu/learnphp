<?php
interface Drawable
{
    public function draw($shape);
}

interface Printable
{
    public function print();
}

class MyDrawing implements Drawable, Printable
{
    public function draw($shape)
    {
        echo "Drawing a $shape shape!";
    }

    public function print()
    {
        echo "<br>Printing the drawing!";
    }
}


$myDrawing = new MyDrawing();
$myDrawing->draw("circle");
$myDrawing->print();
