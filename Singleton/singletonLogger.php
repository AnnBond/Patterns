<?php

class Singleton
{
    protected static $instance;
    private $log;

    private function __construct()
    {
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public function setLog($log) {
        return $this->log[] = $log;
    }

    public function getLog() {
        foreach($this->log as $item) {
            echo '<i>'.$item . '</i><br>';
        }
    }

}

$singleton = Singleton::getInstance();
$singleton->setLog('gg');

$singleton1 = Singleton::getInstance();
$singleton1->setLog('dfd');

$query = "SELECT * FROM Users";
$singleton->setLog($query);

echo $singleton->getLog() . '</br>';
//echo $singleton1->getLog();

