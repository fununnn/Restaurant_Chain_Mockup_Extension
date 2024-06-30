<?php

namespace RestaurantChains;

use FileConvertibles\FileConvertible;
use Faker\Factory;

class RestaurantLocation implements FileConvertible{

    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct(string $name, string $address, string $city, string $state, string $zipCode, array $employees, bool $isOpen, bool $hasDriveThru){
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }

    public function toString(): string{
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZip Code: %s\nEmployees: %s\nIs Open: %s\nHas Drive Thru: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            implode(", ", $this->employees),
            $this->isOpen ? "Yes" : "No",
            $this->hasDriveThru ? "Yes" : "No"
        );
    }

    public function toHTML(): string{
        return sprintf(
            "<div class='location-card'>
                <h2>%s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>Employees: %s</p>
                <p>Is Open: %s</p>
                <p>Has Drive Thru: %s</p>
            </div>",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            implode(", ", $this->employees),
            $this->isOpen ? "Yes" : "No",
            $this->hasDriveThru ? "Yes" : "No"
        );
    }

    public function toMarkdown(): string{
        return "## Location: {$this->name}
        - Address: {$this->address}
        - City: {$this->city}
        - State: {$this->state}
        - Zip Code: {$this->zipCode}
        - Employees: {$this->employees}
        - Is Open: {$this->isOpen}
        - Has Drive Thru: {$this->hasDriveThru}";
    }

    public function toArray(): array{
        return [
            "name" => $this->name,
            "address" => $this->address,
            "city" => $this->city,
            "state" => $this->state,
            "zipCode" => $this->zipCode,
            "employees" => $this->employees,
            "isOpen" => $this->isOpen,
            "hasDriveThru" => $this->hasDriveThru
        ];
    }
    public function displayLocationInformation(): void{
        echo $this->name;
        echo $this->address;
        echo $this->city;
        echo $this->state;
        echo $this->zipCode;
        echo $this->isOpen;
    }

    public static function RandomGenerator(int $minZipCode, int $maxZipCode): RestaurantLocation {
        $faker = Factory::create();

        $name = $faker->company;
        $address = $faker->address;
        $city = $faker->city;
        $state = $faker->state;
        $zipCode = $faker->postcode;
        $employees = [];
        for ($i = 0; $i <$faker->numberBetween(1,10); $i++){
            $employees[] = $faker->name;
        }
        $isOpen = $faker->boolean;
        $hasDriveThru = $faker->boolean;
        $zipCode = $faker->numberBetween($minZipCode, $maxZipCode);
        return new RestaurantLocation($name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru);
    }
}