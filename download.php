<?php

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

require_once 'vendor/autoload.php';
require_once 'Employees/User.php';
require_once 'Helpers/RandomGenerator.php';

use Employee\User;
use Helpers\RandomGenerator;
use RestaurantChains\RestaurantChain;

// get parameters
$count = $_POST['count'] ?? 5;
$format = $_POST['format'] ?? 'html';
$employeeCount = $_POST['employeeCount'] ?? 100;
$minSalary = $_POST['minSalary'] ?? 20000;
$maxSalary = $_POST['maxSalary'] ?? 100000;
$locationCount = $_POST['locationCount'] ?? 10;
$minZipCode = $_POST['minZipCode'] ?? 0;
$maxZipCode = $_POST['maxZipCode'] ?? 99999; 

// validate parameters
$count = (int) $count;

$users = RandomGenerator::users($count,$count);

if ($format === 'markdown') {
    header('Content-Type: text/x-markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($users as $user) {
        echo $user->toMarkdown();
    }
} elseif($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $userArray = array_map(fn($user) => $user->toArray(), $users);
    echo json_encode($userArray);
}elseif($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($users as $user) {
        echo $user->toString();
    }
}else{
    header('Content-Type: text/html');
    foreach ($users as $user) {
        echo $user->toHTML();
    }
}

$chain = RestaurantChain::RandomGenerator(
    $employeeCount,
    $minSalary,
    $maxSalary,
    $locationCount,
    $minZipCode,
    $maxZipCode
);

switch ($format) {
    case 'json':
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="restaurant_chain.json"');
        echo json_encode($chain->toArray());
        break;
    case 'txt':
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="restaurant_chain.txt"');
        echo $chain->toString();
        break;
    case 'markdown':
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="restaurant_chain.md"');
        echo $chain->toMarkdown();
        break;
    default:
        header('Content-Type: text/html');
        echo $chain->toHTML();
        break;
}