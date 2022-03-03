<?php

namespace Midnox\Model;

class OtherCostModel
{
    public string $date;
    public string $costName;
    public int $quantity;
    public float $price;
    public float $total;

    /**
     * Get the value of date
     */ 
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of costName
     */ 
    public function getCostName(): string
    {
        return $this->costName;
    }

    /**
     * Set the value of costName
     *
     * @return  self
     */ 
    public function setCostName($costName)
    {
        $this->costName = $costName;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->quantity * $this->price;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }
}
