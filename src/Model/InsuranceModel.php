<?php

namespace Midnox\Model;

class InsuranceModel
{

    public $date;
    public $billingType;
    public $insuranceType;
    public $price;

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
    public function getBillingType()
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
    public function getInsuranceType()
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
    public function getPrice()
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
