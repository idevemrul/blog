<?php
// ====== TODAY TOPICS=====
// 1. static method
// 2. traits


class firstClass
{
    function __construct()
    {
        echo "firstClass:const <br>";
    }
    static $x = 30;
    static function methodOne()
    {
        echo self::$x;
        echo "<br> methodOne";
    }
}


echo firstClass::$x;

firstClass::methodOne();
