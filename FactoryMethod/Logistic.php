<?php

interface System {
    public function createTransport();
}

interface Transport {
    public function moveBaggage();
}

class RoadLogistic implements System {
    public function createTransport()
    {
        return new Bus();
    }
}

class SeaLogistic implements System {
    public function createTransport()
    {
        return new Ship();
    }
}

class Ship implements Transport {
    public function moveBaggage()
    {
        echo 'move by sea';
    }
}

class Bus implements Transport {
    public function moveBaggage()
    {
        echo 'move by land';
    }
}


$roadDepartment = new RoadLogistic();
$bus = $roadDepartment->createTransport();
print_r($bus->moveBaggage() . '<br>');

$seaDepartment = new SeaLogistic();
$ship = $seaDepartment->createTransport();
print_r($ship->moveBaggage());