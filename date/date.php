<?php
date_default_timezone_set("Asia/Kathmandu");
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
echo "<hr>";
echo "The time is " . date("h:i:sa");


$d = mktime(11, 14, 54, 8, 12, 2014);
echo "<br>Created date is " . date("Y-m-d h:i:sa", $d);


$d = strtotime("10:30pm April 15 2014");
echo "<br>Created date is " . date("Y-m-d h:i:sa", $d);

echo "<br>";

$d = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";
