<?php
require 'init.php';

use Midnox\Controller\ApartmentController;

$apartmentController = new ApartmentController($pdo);

echo $twig->render('record.twig', array(
    'title' => 'Wohnung'
));

if (!empty($_POST['date'])){
    $apartmentController->addApartmentCosts();
}
