<?php
require 'init.php';

use Midnox\Controller\ServiceController;

$serviceController = new ServiceController($pdo);

echo $twig->render('record.twig', array(
    'title' => 'Dienstleistungen'
));

if (!empty($_POST['date'])){
    $serviceController->addServiceCosts();
}
