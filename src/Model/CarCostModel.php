<?php

namespace Midnox\Model;

class CarCostModel
{

    public $date;
    public $costType;
    public $pice;
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
    public function getPice()
    {
        return $this->pice;
    }

    /**
     * @param mixed $pice
     */
    public function setPice($pice)
    {
        $this->pice = $pice;
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