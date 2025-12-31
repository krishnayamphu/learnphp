<?php
class Employee
{
    public $name;
    public static $company = "Tech Solutions Pvt Ltd";

    public static function getCompany()
    {
        echo "Company: " . self::$company . "<br>";
    }
}
$emp1 = new Employee();
$emp1->name = "Alice";

echo "Employee Name: " . $emp1->name . "<br>";
Employee::getCompany();

$emp2 = new Employee();
$emp2->name = "John";

echo "Employee Name: " . $emp2->name . "<br>";
echo "Company: " . Employee::$company;
