<?php

class Person
{
    public $name;
    public $age;

    public function sayHello($name)
    {
        echo 'Hi I am '.$name;
    }
    public function setName($name){
        $this->name=$name;
    }
}

$myPerson = new Person;
$myPerson2 = new Person;

//$myPerson->sayHello('Rahim');
//$myPerson2->sayHello('Alisa');

$myPerson->setName('Rahim');
$myPerson2->setName('Alisa');
echo $myPerson ->name;
echo $myPerson2->name;
