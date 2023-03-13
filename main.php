<?php

require_once('vendor/autoload.php');

use MyProject\Employee;
use MyProject\Department;

$Emp1 = new Employee(250, 'Artem', 25000, new DateTime('2015-10-06'));
$Emp2 = new Employee(100, 'Nikita', 30000, new DateTime('2010-30-11'));

echo $Emp1->workYears().'<br/>';

try {
    $Emp3 = new Employee(-10, 'Maxim', 50000, new DateTime('2019-20-03'));
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

$Departmensts = [
   new Department($Dep1, 'analytics'),
   new Department($Dep2, 'testers'),
   new Department($Dep3, 'developers'),
];


