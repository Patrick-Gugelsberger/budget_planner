<?php
include 'init.php';

use Midnox\Controller\ProductController;

$productController = new ProductController($pdo);

echo $twig->render('record.twig', array(
    'title' => 'Produkte'
));

if (!empty($_POST['date'])){
    $productController->addProducts();
}