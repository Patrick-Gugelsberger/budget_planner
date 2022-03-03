<?php

include 'init.php';

use Midnox\Controller\OtherCostController;

$otherCostController = new OtherCostController($pdo);
$otherCosts = $otherCostController->fetchOtherCosts();

echo $twig->render('record.twig', array(
    'title' => 'Sonstige Kosten',
    'otherCosts' => $otherCosts
));

if (!empty($_POST['date'])) {
    $otherCostController->addOtherCosts();
    echo "<meta http-equiv='refresh' content='0'>";
}
