<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\InsuranceModel as Insurance;

class InsuranceController
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchInsurances()
    {
        $sql = 'SELECT * FROM insurance';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, Insurance::class);
    }

    public function addInsurances()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $billingType = $_POST['billingType'][$i];
            $price = $_POST['price'][$i];
            $insuranceType = $_POST['insuranceType'][$i];

            $sql = 'INSERT INTO insurance (date, billingType, price, insuranceType) VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $billingType, $price, $insuranceType]);
        }
    }
}