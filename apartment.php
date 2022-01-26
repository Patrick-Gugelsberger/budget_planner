<?php
require 'init.php';

use Midnox\Controller\ApartmentController;

$apartmentController = new ApartmentController($pdo);

echo $twig->render('apartment.twig', array(
    'title' => 'Wohnungskosten'
));

if (isset($_POST)){
    $apartmentController->addApartmentCosts();
}
