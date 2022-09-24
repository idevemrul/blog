<?php
// Abstract class-----

//  1. Abstract class must start with abstract keyword
//  2. This must contain abstruct method. 
//  3. This can't make any object directly.
//  4. Abstruct class and child class must have abstruct method.


abstract class firstClass
{
    abstract function methodOne();

    public function name()
    {
        echo "Mazed";
    }
}


class secondClass extends firstClass
{
    function methodOne()
    {
        echo "This is abstact class method";
    }
}

$obj = new secondClass();

echo $obj->methodOne();
echo $obj->name();
