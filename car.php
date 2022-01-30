<?php
require 'init.php';

use Midnox\Controller\CarController;

$carController = new CarController($pdo);

echo $twig->render('record.twig', array(
    'title' => 'Auto'
));

if (!empty($_POST['date'])){
    $carController->addCarCosts();
}
