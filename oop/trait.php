<?php
trait Drawable
{
    public function draw($shape)
    {
        echo "Drawing a $shape shape!<br>";
    }
}

trait Printable
{
    public function print()
    {
        echo "Printing the drawing!<br>";
    }
}

class MyDrawing
{
    use Drawable;
    use Printable;
}

$myDrawing = new MyDrawing();
$myDrawing->draw("circle");
$myDrawing->print();
