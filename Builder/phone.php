<?php

class Phone
{
    private $name;
    private $_os;

    public function setName($name) {
        $this->name = $name;
    }

    public function setOs($os) {
        $this->_os = $os;
    }
}

abstract class BuilderPhone {
    protected $_phone;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    public function createPhone() {
        $this->_phone = new Phone;
    }

    abstract public function buildName();
    abstract public function buildOs();
}

class BuilderXiaomi4x extends BuilderPhone {

    public function buildName()
    {
        $this->_phone->setName('Xiaomi4x');
    }

    public function buildOs()
    {
        $this->_phone->setOs('Android');
    }
}

class BuilderIphone7 extends BuilderPhone {

    public function buildName()
    {
        $this->_phone->setName('Iphone7');
    }

    public function buildOs()
    {
        $this->_phone->setOs('iOs');
    }
}

class BuilderNokiaLumia extends BuilderPhone {

    public function buildName()
    {
        $this->_phone->setName('Nokia Lumia');
    }

    public function buildOs()
    {
        $this->_phone->setOs('Windows');
    }
}

class Chooser {
    private $_builderPhone;

    public function setBuilderPhone(BuilderPhone $phone) {
        $this->_builderPhone = $phone;
    }

    public function getPhone() {
        return $this->_builderPhone->getPhone();
    }

    public function constructPhone() {
        $this->_builderPhone->createPhone();
        $this->_builderPhone->buildName();
        $this->_builderPhone->buildOs();
    }
}

$user = new Chooser();
$xiaomi = new BuilderXiaomi4x();

$apple = new BuilderIphone7();

$user->setBuilderPhone($apple);
$user->constructPhone();
$realPhone = $user->getPhone();// :)

var_dump($realPhone);