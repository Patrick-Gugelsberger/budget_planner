<?php

namespace Midnox\Model;

class CarModel
{
    public $date;
    public $costType;
    public $price;
    public $quantity;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCostType()
    {
        return $this->costType;
    }

    /**
     * @param mixed $costType
     */
    public function setCostType($costType)
    {
        $this->costType = $costType;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $pice
     */
    public function setPrice($price)
    {
        $this->pice = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}
