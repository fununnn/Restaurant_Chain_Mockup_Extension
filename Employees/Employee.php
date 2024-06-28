<?php
    namespace Employees;

    use DateTime;
    use FileConvertibles\FileConvertible;
    use Employees\User;

    class Employee extends User implements FileConvertible{
        private string $jobTitle;
        private float $salary;
        private DateTime $startDate;
        private array $awards;

        public function __construct(string $firstName, string $lastName, string $jobTitle, float $salary, DateTime $startDate, array $awards){
            parent::__construct($firstName, $lastName);
            $this->jobTitle = $jobTitle;
            $this->salary = $salary;
            $this->startDate = $startDate;
            $this->awards = $awards;
        }
        public function toString(): string{
            return parent::toString() . " " . $this->jobTitle . " " . $this->salary . " " . $this->startDate->format('Y-m-d'). " " . implode(", ", $this->awards);
        }
        public function toHTML(): string
        {
            return parent::toHTML() . " " . $this->jobTitle . " " . $this->salary . " " . $this->startDate->format('Y-m-d'). " " . implode(", ", $this->awards);
        }

        public function toMarkdown(): string
        {
            return parent::toMarkdown() . " " . $this->jobTitle . " " . $this->salary . " " . $this->startDate->format('Y-m-d'). " " . implode(", ", $this->awards);    
        }

        public function toArray(): array{
            return parent::toArray() + ["jobTitle" => $this->jobTitle, "salary" => $this->salary, "startDate" => $this->startDate, "awards" => $this->awards];
        }
    }