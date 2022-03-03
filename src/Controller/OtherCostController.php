<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\OtherCostModel as OtherCost;

class OtherCostController
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchOtherCosts()
    {
        $sql = 'SELECT * FROM otherCost';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, OtherCost::class);
    }

    public function addOtherCosts()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $costName = $_POST['costName'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO otherCost (date, costName, quantity, price) VALUES (?,?,?,?)';
            $this->pdo->prepare($sql)->execute([$date, $costName, $quantity, $price]);
        }
    }
}
