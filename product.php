<?php
include 'init.php';

use Midnox\Controller\ProductController;

$productController = new ProductController($pdo);

echo $twig->render('product.twig', array(
    'title' => 'Produkterfassung'
));

if (isset($_POST)){
    $productController->addProducts();
}