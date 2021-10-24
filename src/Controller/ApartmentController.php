<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ApartmentModel as Apartment;

class ApartmentController
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchApartmentCosts()
    {
        $sql = 'SELECT * FROM apartment';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Apartment::class);
    }

    public function addApartmentCosts()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $costType = $_POST['costType'][$i];
            $quantity = $_POST['quantity'][$i];
            $pricePerUnit = $_POST['pricePerUnit'][$i];

            $sql = 'INSERT INTO apartment (date, costType, quantity, pricePerUnit) VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $costType, $quantity, $pricePerUnit]);
        }
    }
}