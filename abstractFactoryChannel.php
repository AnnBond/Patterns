<?php

/*Interface for channel */

interface Channel {
    public function getDescription();
}

class ChannelForYoung implements Channel {

    public function getDescription()
    {
        return ('I am channel for young peoples');
    }
}

class ChannelForOld implements Channel {

    public function getDescription()
    {
        return ('I am channel for old peoples');
    }
}

/*Interface for person */
interface Person {
    public function getAge();
}

class YoungPerson implements Person {
    public function getAge() {
        return ('15');
    }
}

class OldPerson implements Person {
    public function getAge() {
        return ('80');
    }
}

/*Interface for Factory */

interface ChannelFactory {
    public function makeChannel() : Channel;
    public function makePerson() : Person;
}

class FactoryChannelForYoung implements ChannelFactory {
    public function makeChannel(): Channel
    {
        return new ChannelForYoung();
    }

    public function makePerson(): Person
    {
        return new YoungPerson();
    }
}

class FactoryChannelForOld implements ChannelFactory {
    public function makeChannel(): Channel
    {
        return new ChannelForOld();
    }

    public function makePerson(): Person
    {
        return new OldPerson();
    }
}

$factoryChannelForYoung = new FactoryChannelForYoung();
$ChannelForYoung = $factoryChannelForYoung->makeChannel();
$youngPerson = $factoryChannelForYoung->makePerson();

echo('Channel description: ' . $ChannelForYoung->getDescription() . '</br> Age: ' . $youngPerson->getAge() . ' years old </br>');

$factoryChannelForOld = new FactoryChannelForOld();
$ChannelForOld = $factoryChannelForOld->makeChannel();
$oldPerson = $factoryChannelForOld->makePerson();

echo('Channel description: ' . $ChannelForOld->getDescription() . '</br> Age: ' . $oldPerson->getAge() . ' years old');