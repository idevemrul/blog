<?php
// Interface--------

//  1. Interface can contain only abstract method.
//  2. Inter face not allowed any variable.
//  3. All method inside interface must be public.
//  4. Inheritance allow multiple inheritence.
//  5. Interface not allowed constructor.

interface firstClass
{
    function methodOne();
}

interface secondClass
{
    function methodTwo();
}

class thirdClass implements firstClass, secondClass
{
    function methodOne()
    {
        return $this->x = 10;
    }

    function methodTwo()
    {
        return $this->y = 20;
    }

    function thirdMethod()
    {
        echo $this->methodOne() + $this->methodTwo();
    }
}

$obj = new thirdClass();
echo $obj->thirdMethod();
