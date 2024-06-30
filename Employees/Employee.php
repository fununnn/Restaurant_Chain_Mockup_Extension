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

        public function __construct(
                int $id,
                string $firstName,
                string $lastName,
                string $email,
                string $password,
                string $phoneNumber,
                string $address,
                DateTime $birthDate,
                DateTime $membershipExpirationDate,
                string $role,
                string $jobTitle,
                float $salary,
                DateTime $startDate,
                array $awards
            ){
            parent::__construct($id, $firstName, $lastName, $email, $password, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);
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

        public static function RandomGenerator(float $minSalary, float $maxSalary): Employee
        {
            $faker = Factory::create();
            return new Employee(
                $faker->unique()->randomNumber(),  // ここで整数の id を生成
                $faker->firstName(),
                $faker->lastName(),
                $faker->email,
                $faker->password,
                $faker->phoneNumber,
                $faker->address,
                $faker->dateTimeThisCentury,
                $faker->dateTimeBetween('-10 years', '+20 years'),
                $faker->randomElement(['admin', 'user', 'guest']),
                $faker->jobTitle(),
                $faker->randomFloat(2, $minSalary, $maxSalary),
                $faker->dateTimeThisDecade,
                $faker->words(3)
            );
        }
    }