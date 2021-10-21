<?php
include 'init.php';

use Midnox\Controller\ProductsController;

$productsController = new ProductsController($pdo);

echo $twig->render('products.twig', array(
    'title' => 'Produkterfassung'
));

if (isset($_POST)){
    $productsController->addProducts();
}