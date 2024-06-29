<?php
    namespace Employees;

    use DateTime;
    use FileConvertibles\FileConvertible;
    use Employees\User;
    use Faker\Factory;

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
        public function displayEmployeeInformation(): void{
        echo $this->jobTitle;
        echo $this->salary;
        echo $this->startDate;
        echo $this->awards;
        }

        public static function RandomGenerator(): Employee{
            $faker = Factory::create();

            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $jobTitle = $faker->jobTitle();
            $salary = $faker->numberBetween(10000, 100000);
            $startDate = $faker->dateTime();
            $awards = $faker->words(5);

            return new Employee($firstName, $lastName, $jobTitle, $salary, $startDate, $awards);
        }
    }