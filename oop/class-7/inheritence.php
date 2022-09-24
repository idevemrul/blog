<?php
class classOne
{
    public $x = 1;

    function __construct()
    {
        $this->x = 10;
        echo "<br>Constructor One";
    }

    function methodOne()
    {
        echo "<br>method one";
    }
}

class classTwo extends classOne
{
    function __construct()
    {
        parent::__construct();
        $this->x = 20;
        echo "<br>constrouctor two";

        $this->y = $this->x + 5;
    }
}

$test = new classTwo();

echo '<br> X= ' . $test->x;
echo '<br> Y =' . $test->y;
