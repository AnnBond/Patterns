<?php

interface Door {
    public function getDescription();
    public function getPrice();
    public function getSize();
}

class PlasticDoor implements Door {

    public function getDescription()
    {
        return ('I am plastic door');
    }

    public function getPrice()
    {
        return ('100$');
    }

    public function getSize()
    {
        return ('200 x 80');
    }
}

class WoodenDoor implements Door {

    public function getDescription()
    {
        return ('I am wooden door');
    }

    public function getPrice()
    {
        return ('200$');
    }

    public function getSize()
    {
        return ('180 x 80');
    }
}

class IronDoor implements Door {

    public function getDescription()
    {
        return ('I am iron door');
    }

    public function getPrice()
    {
        return ('150$');
    }

    public function getSize()
    {
        return ('180 x 80');
    }
}


interface DoorExpert {
    public function getAction();
}

class PlasticDoorExpert implements DoorExpert {
    public function getAction() {
        return ('I work with plastic doors');
    }
}

class WoodenDoorExpert implements DoorExpert {
    public function getAction() {
        return ('I work with wooden doors');
    }
}

class IronDoorExpert implements DoorExpert {
    public function getAction() {
        return ('I work with iron doors');
    }
}


interface DoorFactory {
    public function makeDoor() : Door;
    public function makeExpert() : DoorExpert;
}

class PlasticDoorFactory implements DoorFactory {
    public function makeDoor(): Door
    {
        return new PlasticDoor();
    }

    public function makeExpert(): DoorExpert
    {
        return new PlasticDoorExpert();
    }
}

class WoodenDoorFactory implements DoorFactory {
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeExpert(): DoorExpert
    {
        return new WoodenDoorExpert();
    }
}

class IronDoorFactory implements DoorFactory {
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeExpert(): DoorExpert
    {
        return new IronDoorExpert();
    }
}

$plasticFactory = new PlasticDoorFactory();
$plasticDoor = $plasticFactory->makeDoor();
$plasticExpert = $plasticFactory->makeExpert();

echo('Plastic door description: ' . $plasticDoor->getDescription());
echo ('</br>');

$ironFactory = new PlasticDoorFactory();
$ironDoor = $ironFactory->makeDoor();
$ironExpert = $ironFactory->makeExpert();

echo ('Iron door price: ' . $ironDoor->getPrice());