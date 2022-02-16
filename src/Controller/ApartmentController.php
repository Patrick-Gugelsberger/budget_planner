<?php

namespace Midnox\Controller;

use Midnox\Model\ApartmentModel;
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

    /**
     * @return Apartment[]
     */
    public function fetchApartmentCosts(): array
    {
        $sql = 'SELECT * FROM apartment';
        $result = $this->pdo->query($sql);

        return $result->fetchAll(PDO::FETCH_CLASS, Apartment::class);
    }

    /**
     * @param array $apartments
     * @return array
     */
    public function convertApartmentTypeNames(array $apartments): array
    {
        foreach ($apartments as $apartment) {
            switch ($apartment->getCostType()) {
                case 'rent':
                    $apartment->setCostType('Miete');
                    break;
                case 'furniture':
                    $apartment->setCostType('Möbel');
                    break;
                case 'otherCosts':
                    $apartment->setCostType('Sonstige Kosten');
                    break;
            }
        }

        return $apartments;
    }

    /**
     * @return void
     */
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
