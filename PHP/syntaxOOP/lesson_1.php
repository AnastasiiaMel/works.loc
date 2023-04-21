<?php
class Person {
    public $name = 'Rahim';
    public $age;

    public function sayHello(){
        echo 'Hi I am';
    }
}

$myPerson = new Person();
$myPerson->sayHello();
echo $myPerson->name;
$myPerson->name='Rahim';