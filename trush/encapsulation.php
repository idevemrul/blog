<?php
// ===========ENCAPSULATION=============
// =====================================

// -------access modifire list------
// public= Self+inharit+outside;
// private= self+inherit+0;
// protected= self+0+0;

// Access level to childClass must be weaker for reuse parents method or variables.


class firstClass
{
    private $x = 5;

    private function methodOne()
    {
        return $this->x = 10;
    }

    function getX()
    {
        return $this->x + 20;
    }
}

class secondClass extends firstClass
{
    public $x = 13;
    protected function methodOne()
    {
        return $this->x = 11;
    }
    function methodTwo()
    {
        echo $this->x;
    }
    function methodThree()
    {
        return $this->methodOne();
        // echo "methodThree";
    }
    function getX()
    {
        echo $this->x;
    }
}

$obj1 = new firstClass();
$obj2 = new secondClass();

// echo $obj1->x;
// echo $obj1->getX();
// $obj2->methodTwo();
// echo $obj1->methodOne();
echo $obj2->getX();
