<?php

require 'init.php';

use Midnox\Controller\CarController;

$carController = new CarController($pdo);
$carCosts = $carController->convertCarTypeNames($carController->fetchCarCosts());

echo $twig->render('record.twig', array(
    'title' => 'Auto',
    'carCosts' => $carCosts
));

if (!empty($_POST['date'])) {
    $carController->addCarCosts();
    echo "<meta http-equiv='refresh' content='0'>";
}
