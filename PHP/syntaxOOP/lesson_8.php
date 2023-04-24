<?php


class Person
{
    public $name;
    public $age;
    const ID = 10;

    public function __construct($name, int $age)
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

    public static function saySomething()
    {
        echo 'bla-bla in global function';
    }
}

class Student{
    public $name = 'I am Student';
}


class University{
    public $studiens;
    public function addStudent(Student $student){
        echo $student->name;
    }

}
$univer = new University;

$person = new Person('Rahim', 20);
$student = new Student();
echo $student->name;
$univer->addStudent($person);