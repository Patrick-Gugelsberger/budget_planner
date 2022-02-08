<?php

namespace Midnox\Controller;

use PDO;
use Midnox\Model\ServiceModel as Service;

class ServiceController
{

    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchChartData($beginDate, $endDate)
    {
        $sql = sprintf('SELECT serviceName, price FROM service WHERE date >= %s AND date <= %s', $beginDate, $endDate);
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Service::class);
    }

    public function fetchServiceCosts()
    {
        $sql = 'SELECT * FROM service';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Service::class);
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
            $this->pdo->prepare($sql)->execute([$date, $serviceName, $serviceType, $price]);
        }
    }
}
