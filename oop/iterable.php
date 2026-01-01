<?php
function getStudentList(iterable $stdList)
{
    foreach ($stdList as $value) {
        echo "Name: $value<br>";
    }
}


$studentList = ["Ram", "Hari", "Sita"];
getStudentList($studentList);


function getProvince(): iterable
{
    $provinceList = ["Koshi", "Bagmati", "Madhesh", "Lumbini", "Gandaki", "Karnali", "Sudurpashchim"];
    return $provinceList;
}

$myProvinceList = getProvince();

echo "<hr>";

foreach ($myProvinceList as $value) {
    echo "Province name: $value<br>";
}
