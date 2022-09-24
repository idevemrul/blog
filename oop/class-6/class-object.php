
<?php
// ----- class and Object--------

class class1
{
    function __construct()
    {
        echo "hello constructor <br>";
    }

    public $x = 10;
    function method1()
    {
        echo "This is first clss test<br>";
        echo $this->x++;
    }

    function x()
    {
        return $this->x;
    }


    function __destruct()
    {
        echo "<br>bye destructor";
    }
}


$obj = new class1();

// $obj2 = new class1();
$obj->method1();
// $obj->method1();

// echo '<br>' . $obj->x;

// $obj2->method1();
