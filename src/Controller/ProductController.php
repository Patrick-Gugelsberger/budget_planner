<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ProductModel as Products;

class ProductController
{

    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchProducts()
    {
        $sql = 'SELECT * FROM product';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Products::class);
    }

    public function fetchChartData($startDate, $endDate)
    {
        $sql = sprintf('SELECT productType, price FROM product WHERE date >= %s AND date <= %s', $startDate, $endDate);
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
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
            $this->pdo->prepare($sql)->execute([$date, $productName, $productType, $quantity, $price]);
        }
    }
}
