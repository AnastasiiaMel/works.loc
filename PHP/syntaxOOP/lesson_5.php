<?php

class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello()
    {
        echo 'Hi I am ' . $this->name . ' and I am ' . $this->sayAge();
    }

    public function setName($name)
    {
        $this->name = $name; // Rahim
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function sayAge()
    {
        return $this->age;
    }
}

$myPerson = new Person('Rahim', 14);
$myPerson2 = new Person('Alisa', 10);

//$myPerson->setName('Rahim');
//$myPerson->setAge(14);
//$myPerson->sayHello();
echo $myPerson->name;
echo $myPerson->age;

echo $myPerson2->name;
echo $myPerson2->age;