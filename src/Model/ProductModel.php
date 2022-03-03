<?php

namespace Midnox\Model;

class ProductModel
{
    public string $date;
    public string $productName;
    public string $productType;
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
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * Get the value of productName
     */ 
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * Set the value of productName
     *
     * @return  self
     */ 
    public function setProductName($productName): void
    {
        $this->productName = $productName;
    }

    /**
     * Get the value of productType
     */ 
    public function getProductType(): string
    {
        return $this->productType;
    }

    /**
     * Set the value of productType
     *
     * @return  self
     */ 
    public function setProductType($productType): void
    {
        $this->productType = $productType;
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
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
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
     * @return  float
     */ 
    public function setPrice($price): void
    {
        $this->price = $price;
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
