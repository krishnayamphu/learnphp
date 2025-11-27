<?php
function num(...$numbers)
{
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}
echo "The total is: " . num(10, 20, 30, 40);
echo "<br>The total is: " . num(10, 20);
