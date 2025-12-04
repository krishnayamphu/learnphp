<?php

function divide($x, $y)
{
    if ($y === 0) {
        throw new Exception("Division by zero");
    }
    return $x / $y;
}

try {
    echo "Result: " . divide(10, 0);
} catch (Exception $e) {
    // echo $e;
    echo "<br>you can't divide by zero.";
}
