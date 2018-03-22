<?php

class Single
{
    public function __clone()
    {
    }
}

class Prototype
{
    public function getClone(Single $single)
    {
        return clone $single;
    }
}

$prototype = new Prototype();
$singleArray[] = $prototype->getClone(new Single());
var_dump($singleArray);


class ClassC
{
    public function __clone()
    {
        //do something
    }
}
$Prototype = new ClassC();
$NewObject = clone $Prototype;

// Method 2
class ClassB
{
    /**
     * This function return new object
     *
     * @return ClassB
     */
    public function getClone()
    {
        $object = new ClassB();
        //do something with object
        return $object;
    }
}
$Prototype = new ClassB();
$NewObject = $Prototype -> getClone();


class ClassA
{
    public function __construct(ClassA $Prototype = null)
    {
        if (null !== $Prototype)
        {
            //do something
        }
    }
}
$Prototype = new ClassA();
$NewObject = new ClassA($Prototype);
