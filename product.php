<?php

include 'init.php';

use Midnox\Controller\ProductController;

$productController = new ProductController($pdo);
$productCosts = $productController->convertProductTypeNames($productController->fetchProducts());

echo $twig->render('record.twig', array(
    'title' => 'Produkte',
    'productCosts' => $productCosts
));

if (!empty($_POST['date'])) {
    $productController->addProducts();
    echo "<meta http-equiv='refresh' content='0'>";
}
