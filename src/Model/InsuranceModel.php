<?php

namespace Midnox\Model;

class InsuranceModel
{
    public string $date;
    public string $billingType;
    public string $insuranceType;
    public float $price;

    /**
     * @return mixed
     */
    public function getDate(): string
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
    public function getBillingType(): string
    {
        return $this->billingType;
    }

    /**
     * @param mixed $billingType
     */
    public function setBillingType($billingType)
    {
        $this->billingType = $billingType;
    }

    /**
     * @return mixed
     */
    public function getInsuranceType(): string
    {
        return $this->insuranceType;
    }

    /**
     * @param mixed $insuranceType
     */
    public function setInsuranceType($insuranceType)
    {
        $this->insuranceType = $insuranceType;
    }

    /**
     * @return mixed
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
