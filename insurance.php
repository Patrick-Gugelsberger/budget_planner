<?php

require 'init.php';

use Midnox\Controller\InsuranceController;

$insuranceController = new InsuranceController($pdo);
$insuranceCosts = $insuranceController->convertInsuranceTypeNames($insuranceController->fetchInsurances());

echo $twig->render('record.twig', array(
    'title' => 'Versicherungen',
    'insuranceCosts' => $insuranceCosts
));

if (!empty($_POST['date'])) {
    $insuranceController->addInsurances();
}
