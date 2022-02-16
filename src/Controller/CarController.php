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

    public function fetchCarCosts(): array
    {
        $sql = 'SELECT * FROM car';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Car::class);
    }

    /**
     * @param array $cars
     * @return array
     */
    public function convertCarTypeNames(array $cars): array
    {
        foreach ($cars as $car) {
            switch ($car->getCostType()) {
                case 'fuel':
                    $car->setCostType('Benzin');
                    break;
                case 'repairs':
                    $car->setCostType('Reparatur');
                    break;
                case 'otherCosts':
                    $car->setCostType('Sonstige Kosten');
                    break;
            }
        }

        return $cars;
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
