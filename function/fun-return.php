<?php

//create a function
function hello()
{
    return "Hello, World!";
}


//call the function
$msg = hello();

echo $msg;

function getMaxSpeed()
{
    return 50;
}

echo "<br>The maximum speed limit is " . getMaxSpeed() . " km/h.";
