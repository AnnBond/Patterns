<?php

abstract class Department {
    public abstract function createEmployee($id);

    public function manage($id) {
        $employee = $this->createEmployee($id);
        $employee->paySalary();
        //$employee->dismiss();
    }
}

class ItDepartment extends Department {
    public function createEmployee($id)
    {
        return new Programmer($id);
    }
}

class AccountingDepartment extends Department {
    public function createEmployee($id)
    {
        return new Accountant($id);
    }
}

abstract class Employee {

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function paySalary(){
        echo 'put money on card ' . $this->id;
    }

    public abstract function work();
}

class Programmer extends Employee {

    public function work()
    {
        echo 'Programming';
    }

}

class Accountant extends Employee {
    public function work()
    {
        echo 'Count money';
    }
}

$itDepartment = new ItDepartment();
$itEmployee = $itDepartment->createEmployee(5);
$itDepartment->manage($itEmployee->id);