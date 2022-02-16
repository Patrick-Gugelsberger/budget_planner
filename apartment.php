<?php

require 'init.php';

use Midnox\Controller\ApartmentController;

$apartmentController = new ApartmentController($pdo);
$apartmentCosts = $apartmentController->convertApartmentTypeNames($apartmentController->fetchApartmentCosts());

echo $twig->render('record.twig', array(
    'title' => 'Wohnung',
    'apartmentCosts' => $apartmentCosts
));

if (!empty($_POST['date'])) {
    $apartmentController->addApartmentCosts();
    echo "<meta http-equiv='refresh' content='0'>";
}
