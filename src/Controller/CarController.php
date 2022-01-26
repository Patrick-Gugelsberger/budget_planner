<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\CarModel as Car;

class CarController
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchCarCosts()
    {
        $sql = 'SELECT * FROM car';
        $stmt->query($sql);

        return $stmt->fetchAll(PDO::FETCH_CLASS, Car::class);
    }

    public function addCarCosts()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $costType = $_POST['costType'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO car (date, costType, quantity, price) VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $costType, $quantity, $price]);
        }
    }
}
