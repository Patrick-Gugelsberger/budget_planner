<?php

require 'init.php';

use Midnox\Controller\ServiceController;

$serviceController = new ServiceController($pdo);
$serviceCosts = $serviceController->fetchServiceCosts();

echo $twig->render('record.twig', array(
    'title' => 'Dienstleistungen',
    'serviceCosts' => $serviceCosts
));

if (!empty($_POST['date'])) {
    $serviceController->addServiceCosts();
    echo "<meta http-equiv='refresh' content='0'>";
}
