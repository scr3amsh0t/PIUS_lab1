<?php 

class Employee {
    private int $id = 2;
    private string $name;
    private int $salary;

    public function __construct($id, $name, $salary)
    {
        $this -> id = $id;
        $this -> name = $name;
        $this -> salary = $salary;
    }  
}

echo $id;