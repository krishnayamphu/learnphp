<?php
$x = 5;

function test()
{
    // global $x;
    // echo $x;

    echo $GLOBALS['x'];
}


test(); // This will output: 5

function myFun()
{
    $GLOBALS['y'] = 10;
}
myFun();
echo "<br>" . $y;
// echo $GLOBALS['y'];
