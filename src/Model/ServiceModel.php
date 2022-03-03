<?php

namespace Midnox\Model;

class ServiceModel
{
    public string $date;
    public string $serviceName;
    public string $serviceType;
    public float $price;

   

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
     * Get the value of serviceName
     */ 
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * Set the value of serviceName
     *
     * @return  self
     */ 
    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;

        return $this;
    }

    /**
     * Get the value of serviceType
     */ 
    public function getServiceType(): string
    {
        return $this->serviceType;
    }

    /**
     * Set the value of serviceType
     *
     * @return  self
     */ 
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;

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
}
