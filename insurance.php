<?php
require 'init.php';

use Midnox\Controller\InsuranceController;

$insuranceController = new InsuranceController($pdo);

echo $twig->render('insurance.twig', array(
    'title' => 'Versicherungserfassung'
));

if (isset($_POST)){
    $insuranceController->addInsurances();
}
