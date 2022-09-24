<?php
// =======ENCAPSULATION=======
//  1. Encapsulation
//  2. Abstract Class
//  3. Interface 

// public=Self+inherit+Outside
// protected=Self+inherit+False
// private =Self+False+False 

// In the case of overwrite child class attribute,the scope of child class must be weeker tehn the parent class. 

use firstClass as GlobalFirstClass;

class firstClass
{
    protected $x = 15;

    private function firstMethod()
    {
        echo $this->x;
    }

    function getX()
    {
        return $this->x;
    }
}

class secondClass extends GlobalFirstClass
{
    private function firstMethod()
    {
        echo "secondClass firstMethod";
    }

    function secondMethod()
    {
        echo $this->x;
    }

    function getThirdMethod()
    {
        return $this->firstMethod();
    }
}


$obj = new firstClass();
$obj2 = new secondClass();

// echo $obj->getX();
// echo $obj->firstMethod();
// echo $obj2->firstMethod();
echo $obj2->getThirdMethod();
// echo $obj2->secondMethod();
