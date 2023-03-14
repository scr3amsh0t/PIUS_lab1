<?php

require_once('vendor/autoload.php');

use MyProject\Employee;
use MyProject\Department;

$Emp1 = new Employee(250, 'Artem', 25000, new DateTime('2015-10-06'));
$Emp2 = new Employee(100, 'Nikita', 30000, new DateTime('2010-10-11'));

echo "Employee " . $Emp1->getExp() . " years of exp.\n"; 

try {
    $Emp3 = new Employee(10, 'Maxim', 40000, new DateTime('2023-03-20'));
}
catch (InvalidArgumentException $except) {
    echo $except->getMessage();
}

$Dep1 = [
    new Employee(10, 'Igor', 50000, new DateTime('2006-02-12')),
    new Employee(11, 'Mikhail', 45000, new DateTime('2006-02-15')),
    new Employee(20, 'Ivan', 22000, new DateTime('2007-01-10')),
];

$Dep2 = [
    new Employee(36, 'Igor', 35000, new DateTime('2010-08-30')),
    new Employee(50, 'Oleg', 60000, new DateTime('2009-11-16')),
    new Employee(77, 'Sergey', 30000, new DateTime('2007-03-26')),
];

$Dep3 = [
    new Employee(63, 'Makar', 90000, new DateTime('2014-10-11')),
    new Employee(17, 'Ilya', 25000, new DateTime('2010-06-02')),
    new Employee(40, 'Nikolay', 40000, new DateTime('2015-03-21')),
];

$Departments = [
   new Department($Dep1, 'analytics'),
   new Department($Dep2, 'testers'),
   new Department($Dep3, 'developers'),
];

$maxTotalSalary = -1;
$maxTotalSalaryDepartments = array();
foreach ($Departments as $department) {
    $totalSalary = $department->getTotalSalary();
    if ($totalSalary > $maxTotalSalary) {
        $maxTotalSalary = $totalSalary;
        $maxTotalSalaryDepartments = array($department);
    }
    else if ($totalSalary == $maxTotalSalary) {
        $maxTotalSalaryDepartments[] = $department;
    }
}


$minTotalSalary = PHP_INT_MAX;
$minTotalSalaryDepartments = array();
foreach ($Departments as $department) {
    $totalSalary = $department->getTotalSalary();
    if ($totalSalary < $minTotalSalary) {
        $minTotalSalary = $totalSalary;
        $minTotalSalaryDepartments = array($department);
    }
    else if ($totalSalary == $minTotalSalary) {
        $minTotalSalaryDepartments[] = $department;
    }
}
 
echo "\nDepartment(s) with highest total salary:\n ";
foreach ($maxTotalSalaryDepartments as $department) {
    echo $department->getName() . "(total salary: " . $department->getTotalSalary() . ")\n";
}

echo "\nDepartment(s) with lowest total salary:\n ";
foreach ($minTotalSalaryDepartments as $department) {
    echo $department->getName() . "(total salary: " . $department->getTotalSalary() . ")\n";
}

