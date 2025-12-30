<?php
class Employee
{
    const COMPANY_NAME = "Tech Solutions Inc.";
    public $employeeName;

    public function employeeInfo($name)
    {
        $this->employeeName = $name;
        echo "Employee Name: " . $this->employeeName . "<br> Company: " . self::COMPANY_NAME;
    }
}

// $emp = new Employee();
// $emp->employeeName = "John Doe";
// echo "Employee Name: " . $emp->employeeName . "<br> Company: " . Employee::COMPANY_NAME;

// $emp2 = new Employee();
// $emp2->employeeName = "Jane Smith";
// echo "<br>Employee Name: " . $emp2->employeeName . "<br> Company: " . Employee::COMPANY_NAME;

$emp3 = new Employee();
$emp3->employeeInfo("Alice Johnson");
