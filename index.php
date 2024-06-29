<?php
//namespace loader

use RestaurantChains\RestaurantChain;
use Faker\Factory;

spl_autoload_register(function ($class){
    $file = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

require 'vendor/autoload.php';
$chain = RestaurantChain::RandomGenerator();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chain Mockup</title>
</head>
<body>
    <h1>Restaurant Chain Mockup</h1>
    <?php echo $chain->toHTML(); ?>

    <h2>Restaurant Locations</h2>
    <?php foreach ($chain->getRestaurantLocations() as $location): ?>
        <?php echo $location->toHTML(); ?>
    <?php endforeach; ?>
</body>
</html>