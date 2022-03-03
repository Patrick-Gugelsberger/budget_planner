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

    
    /**
     * @param string $beginDate
     * @param string $endDate
     * @return Apartment[]
     */
    public function fetchChartData(string $beginDate, string $endDate): array
    {
        $sql = sprintf('SELECT costType, quantity, price FROM apartment WHERE date >= %s AND date <= %s', $beginDate, $endDate);
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
            $costName = $_POST['costName'][$i];
            $costType = $_POST['costType'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];

            $sql = 'INSERT INTO apartment (date, costName, costType, quantity, price) VALUES (?,?,?,?,?)';
            $this->pdo->prepare($sql)->execute([$date, $costName, $costType, $quantity, $price]);
        }
    }
}
