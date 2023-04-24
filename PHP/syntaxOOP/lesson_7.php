<?php


class Person
{
    public $name;
    public $age;
    const ID = 10;

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

    public static function saySomething(){
        echo 'bla-bla in global function';
    }
}
$myPerson = new Person('asd', 14);

Person::saySomething();
//$myPerson->setName('Rahim');
//$myPerson->setAge(14);

//echo $myPerson::ID;