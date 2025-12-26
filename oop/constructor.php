<?php
class Student
{
    public function __construct()
    {
        echo "Student object created.<br>";
    }
}

$std = new Student();
$std1 = new Student();

class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function info()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
    }
    // Getter methods
    public function getName() //get_name()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
}

$person = new Person("Ram", 25);

$person->info();

echo "Using getter methods:<br>";
echo "Name: " . $person->getName() . "<br>";
