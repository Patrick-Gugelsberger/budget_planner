<?php
require 'init.php';

use Midnox\Controller\InsuranceController;

$insuranceController = new InsuranceController($pdo);

echo $twig->render('record.twig', array(
    'title' => 'Versicherungen'
));

if (!empty($_POST['date'])){
    $insuranceController->addInsurances();
}
