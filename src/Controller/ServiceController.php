<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ServiceModel as Service;

class ServiceController
{

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchServiceCosts()
    {
        $sql = 'SELECT * FROM Service';
        $stmt->query($sql);

        return $stmt->fetchAll(PDO::FETCH_CLASS, Service::class);
    }

    public function addServiceCosts()
    {
        $count = count($_POST['date']);

        for ($i = 0; $i < $count; $i++) {
            $date = $_POST['date'][$i];
            $serviceName = $_POST['serviceName'][$i];
            $serviceType = $_POST['serviceType'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO service (date, serviceName, serviceType, price) VALUES (?,?,?,?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$date, $serviceName, $serviceType, $price]);
        }
    }
}
