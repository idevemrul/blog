<?php
// multilevel inheritence---

trait traitOne
{
    function method1()
    {
        echo "traitOne ";
    }
}

trait traitTwo
{
    function method1()
    {
        echo "traitTwo";
    }
}

class classTwo
{
    use traitOne, traitTwo {
        traitTwo::method1 insteadof traitOne;

        traitOne::method1 as methodTest;
    }

    function method2()
    {
        echo "classTwo";
    }
}

class classThree
{
    use traitOne;
    function method3()
    {
        echo "classThree";
    }
}

class classFour extends classThree
{
    function method4()
    {
        echo "classFour";
    }
}

class classFive extends classTwo
{
    function method5()
    {
        echo "classFive";
    }
}

$obj5 = new classFour();

$obj5->method1();
