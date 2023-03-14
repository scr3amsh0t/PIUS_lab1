<?php 

namespace MyProject;

use DateTime;
use InvalidArgumentException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class Employee {

    public function  __construct(
        private int $id, 
        private string $name,
        private float $salary,
        private DateTime $employmentDate
        ) 
        
        {
            $this->validate($this->id, $this->name, $this->salary, $this->employmentDate);
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getSalary():float
    {
        return $this->salary;
    }

    public function getEmploymentDate(): DateTime
    {
        return $this->employmentDate;
    }

    public function validate(
        int $id,
        string $name,
        float $salary,
        DateTime $employmentDate,
    ) 
    
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate(
            [
                'id' => $id,
                'name' => $name,
                'salary' => $salary,
                'employmentDate' => $employmentDate,
            ],

            new Assert\Collection(
                [
                    'id' => [
                        new Assert\Type(['type' => 'integer']),
                        new Assert\GreaterThan(0),
                    ],
                    'name' => [
                        new Assert\Type(['type' => 'string']),
                        new Assert\Length(['min' => 2, 'max' => 20]),
                    ],
                    'salary' => [
                        new Assert\Type(['type' => 'float']),
                        new Assert\GreaterThan(16242),
                    ],
                    'employmentDate' => new Assert\LessThan(new DateTime()),
                ]
            )
        );
        if (0 !== count($violations)) {
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
            throw new InvalidArgumentException();
        }
    }

    public function getExp() {
        $now = new DateTime();
        $employmentDate = new DateTime();
        $interval = $now->diff($employmentDate);
        return $interval-> y;
    }

}
