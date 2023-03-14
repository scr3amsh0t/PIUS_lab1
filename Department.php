<?php

namespace MyProject;

class Department {
    public function __construct(
        private array $employees,
        private string $name,
    )
    {    
    }

    public function getEmployee(): array
    {
        return $this->employees;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getAmountOfEmployees(): int
    {
        return count ($this->employees);
    }

    public function getTotalSalary(): float
    {
        $total = 0;
        foreach($this->employees as $employee)
        {
            $total += $employee->getSalary();
        }
        return $total;
    }
}