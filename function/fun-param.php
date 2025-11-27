<?php

//create a function
function hello($msg)
{
    echo $msg . "<br>";
}

//call the function
// hello("Good Morning!");
// hello("Good Afternoon!");
hello("Good Night!");

function add($x = 1, $y = 2)
{
    echo "The sum is: " . ($x + $y) . "<br>";
}

// add();
add(5, 10);
// add(20, 30);
// add(100, 200);
