<?php
class Person {
    public $name;
    public $age;

    public function sayHello(){
        echo 'Hi I am '.$this->name.' and I am '.$this->sayAge();
    }
    public function setName($name){
        $this->name=$name; // Rahim
    }
    public function setAge($age) {
        $this->age = $age;
    }
    public function sayAge(){
       return  $this->age;
    }
}

$myPerson = new Person;
$myPerson2 = new Person;

//$myPerson->setName('Rahim');
//$myPerson->setAge(10);

//$myPerson2->setName('Alisa');
//$myPerson2->setAge(12);

//echo $myPerson->name; // Rahim
//echo $myPerson2->name; // Alisa
//echo $myPerson->age;

$myPerson->setName('Rahim');
$myPerson->setAge(14);
$myPerson->sayHello();
