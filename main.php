<?php

require_once('vendor/autoload.php');

use MyProject\Employee;
use MyProject\Department;

$Emp1 = new Employee(250, 'Artem', 25000, new DateTime('2015-10-06'));
$Emp2 = new Employee(100, 'Nikita', 30000, new DateTime('2010-10-11'));

echo "Employee has " . $Emp1->getWorkExperience() . " years of work experience.\n"; 

try {
    $Emp3 = new Employee(10, 'maxTo$maxTotalSalaryim', 30000, new DateTime('2024-03-20'));
}
catch (InvalidArgumentException $except) {
    echo $except->getMessage();
}

$Dep1 = [
    new Employee(10, 'Igor', 30000, new DateTime('2006-02-12')),
    new Employee(11, 'Mikhail', 45000, new DateTime('2006-02-15')),
    new Employee(20, 'Ivan', 22000, new DateTime('2007-01-10')),
];

$Dep2 = [
    new Employee(36, 'Igor', 35000, new DateTime('2010-08-30')),
    new Employee(50, 'Oleg', 60000, new DateTime('2009-11-16')),
    new Employee(77, 'Sergey', 30000, new DateTime('2007-03-26')),
    new Employee(14, 'Stanislav', 30000, new DateTime('2018-10-28')),
];

$Dep3 = [
    new Employee(63, 'Makar', 90000, new DateTime('2014-10-11')),
    new Employee(17, 'Ilya', 25000, new DateTime('2010-06-02')),
    new Employee(40, 'Nikolay', 40000, new DateTime('2015-03-21')),
];

$Dep4 = [
    new Employee(25, 'Nikita', 50000, new DateTime('2023-03-11')),
    new Employee(27, 'Zakhar', 45000, new DateTime('2023-03-13')),
];

$Departments = [
   new Department($Dep1, 'analytics'),
   new Department($Dep2, 'testers'),
   new Department($Dep3, 'developers'),
   new Department($Dep4, 'trainees'),
];

$maxTotalSalary = [$Departments[0]];
foreach($Departments as $department) {
    $totalSalary = $department->getTotalSalary();
    if ($totalSalary == $maxTotalSalary[0]->getTotalSalary()) {
        if($department->getAmountOfEmployees() > $maxTotalSalary[0]->getAmountOfEmployees() ) {
            $maxTotalSalary = [$department];
        }
        if($department->getAmountOfEmployees() == $maxTotalSalary[0]->getAmountOfEmployees()) {
            $maxTotalSalary[count($maxTotalSalary)] = $department;
        }
    }
    if ($totalSalary > $maxTotalSalary[0]->getTotalSalary()) {
        $maxTotalSalary = [$department];
    }
}
    
$minTotalSalary = [$Departments[0]];
foreach($Departments as $department) {
    $totalSalary = $department->getTotalSalary();
    if ($totalSalary == $minTotalSalary[0]->getTotalSalary()) {
        if($department->getAmountOfEmployees() > $minTotalSalary[0]->getAmountOfEmployees()) {
            $minTotalSalary = [$department];
        }
        if($department->getAmountOfEmployees() == $minTotalSalary[0]->getAmountOfEmployees()) {
            $minTotalSalary[count($minTotalSalary)] = $department;
        }
    }
    if ($totalSalary < $minTotalSalary[0]->getTotalSalary()) {
        $minTotalSalary = [$department];
    }
}


echo "\nmax total salary: ";
foreach($maxTotalSalary as $department) {
    echo $department->getName() . "(" . $department->getTotalSalary() . ")";
}

echo "\nmin total salary: ";
foreach($minTotalSalary as $department) {
    echo $department->getName() . " (" . $department->getTotalSalary() . ")";
} 
