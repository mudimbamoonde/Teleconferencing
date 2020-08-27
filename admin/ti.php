<?php


class Person{
    public $name;
    public $age;
    public $email;

    function __construct($name,$age,$email)
    {

    }


    public  function getName(){
        return $this->name;
    }

    public  function getEmail(){
        return $this->email;
    }

    public  function getAge(){
        return $this->age;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function setEmail($email){
        $this->email = $email;
    }


}

//$life = new Person("Mudimba",11,"mudimbatrina@gmail.com");
//
//$life->setName("Mudimba");
//$life->setAge(44);
//$life->setEmail("Mudimbatrina@gmail.com");
//
//$get = $life->getName();
//$getE = $life->getEmail();
//$getA = $life->getAge();
//echo $get ." ". $getE." ". $getA;
//
////echo $life->name = "Mudimba";
////echo $life->age = 21;
////echo $life->email = "Mudimbatrina@gmail.com";
//

class customer extends Person{
    public $balance;
    function __construct($name, $age, $email){
        parent::__construct($name, $age, $email);
    }

    public function getBalance(){
        return $this->balance;
    }

    public function setBalance($balance){
        $this->balance = $balance;
    }
}

$bank = new customer("","","");

$bank->setBalance(4511);
$bank->setName("Mudimba");
$bank->setAge(47);
$bank->setEmail("mudimba@gmail.com");

echo $bank->getName()." ".$bank->getBalance()." ". $bank->getEmail()." ".$bank->getAge();