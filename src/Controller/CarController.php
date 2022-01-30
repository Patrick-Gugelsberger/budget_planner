<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\CarModel as Car;

class CarController
{

    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchChartData($beginDate, $endDate)
    {
        $sql = sprintf('SELECT costType, price FROM car WHERE date >= %s AND date <= %s', $beginDate, $endDate);
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Car::class);
    }

    public function fetchCarCosts()
    {
        $sql = 'SELECT * FROM car';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Car::class);
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
            $this->pdo->prepare($sql)->execute([$date, $costType, $quantity, $price]);
        }
    }
}
