<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ApartmentModel as Apartment;

class ApartmentController
{

    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchChartData($beginDate, $endDate)
    {
        $sql = sprintf('SELECT costType, price FROM apartment WHERE date >= %s AND date <= %s', $beginDate, $endDate);
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Apartment::class);
    }

    public function fetchApartmentCosts()
    {
        $sql = 'SELECT * FROM apartment';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Apartment::class);
    }

    public function addApartmentCosts()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $costType = $_POST['costType'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO apartment (date, costType, quantity, price) VALUES (?,?,?,?)';
            $this->pdo->prepare($sql)->execute([$date, $costType, $quantity, $price]);
        }
    }
}
