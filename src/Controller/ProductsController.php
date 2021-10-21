<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ProductsModel as Products;


class ProductsController
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchProducts()
    {
        $sql = 'SELECT * FROM products';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Products::class);
    }

    public function addProducts()
    {

        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $productName = $_POST['productName'][$i];
            $quantity = $_POST['quantity'][$i];
            $pricePerUnit = $_POST['pricePerUnit'][$i];
            $productType = $_POST['productType'][$i];

            $sql = 'INSERT INTO products (date, productName, quantity, pricePerUnit, productType) VALUES (?,?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $productName, $quantity, $pricePerUnit, $productType]);
        }
    }
}