<?php

namespace RestaurantChains;

use RestaurantChains\Company;
use RestaurantChains\RestaurantLocation;
use Faker\Factory;
use Employees\Employee;

class RestaurantChain extends Company{

    private int $chainId;
    private array $restaurantLocations;
    private string $cuisineType;
    private string $parentCompany;

    public function __construct(
        string $name,
        int $foundingYear,
        string $description,
        string $website,
        string $phone,
        string $industry,
        string $ceo,
        bool $isPubliclyTraded,
        string $country,
        string $founder,
        int $totalEmployees,
        int $chainId,
        array $restaurantLocations,
        string $cuisineType,
        string $parentCompany
    ){
        parent::__construct($name, $foundingYear, $description, $website, $phone, $industry, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees);
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->parentCompany = $parentCompany;
    }

    public function displayRestaurantChainInformation(): void{
        echo parent::displayCompanyInformation();
        echo $this->chainId;
        echo $this->restaurantLocations;
        echo $this->cuisineType;
        echo $this->parentCompany;
    }

    public function addRestaurantLocation(RestaurantLocation $restaurantLocation): void{
        $this->restaurantLocations[] = $restaurantLocation;
    }

    public function displayAllRestaurantLocations(): void{
        echo $this->restaurantLocations;
    }

    public static function RandomGenerator(
        int $employeeCount,
        float $minSalary,
        float $maxSalary,
        int $locationCount,
        int $minZipCode,
        int $maxZipCode
    ): RestaurantChain{
        $faker = Factory::create();

        $name = $faker->company;
        $foundingYear = $faker->year;
        $description = $faker->sentence;
        $website = $faker->url;
        $phone = $faker->phoneNumber;
        $industry = $faker->jobTitle;
        $ceo = $faker->name;
        $isPubliclyTraded = $faker->boolean;
        $country = $faker->country;
        $founder = $faker->name;
        $totalEmployees = $faker->numberBetween(1, 100);
        $chainId = $faker->numberBetween(1, 100);
        $cuisineType = $faker->sentence;
        $parentCompany = $faker->sentence;

        $restaurantLocations = [];
        for ($i = 0; $i < $locationCount; $i++) {
            $restaurantLocations[] = RestaurantLocation::RandomGenerator($minZipCode, $maxZipCode);
    }
        $employees = [];
        for($i, $j = 0; $i < $employeeCount; $i++, $j++){
            $employees[] = Employee::RandomGenerator($minSalary, $maxSalary);
        }

        return new RestaurantChain(
            $name,
            $foundingYear,
            $description,
            $website,
            $phone,
            $industry,
            $ceo,
            $isPubliclyTraded,
            $country,
            $founder,
            $totalEmployees,
            $chainId,
            $restaurantLocations,
            $cuisineType,
            $parentCompany,
            $employees
        );
    }

    public function getRestaurantLocations(): array{
        return $this->restaurantLocations;
    }
}