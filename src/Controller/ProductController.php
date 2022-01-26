<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ProductModel as Products;

class ProductController
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchProducts()
    {
        $sql = 'SELECT * FROM product';
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
            $productType = $_POST['productType'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO product (date, productName, productType, quantity, price) VALUES (?,?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $productType, $productName, $quantity, $price]);
        }
    }
}
