<?php

namespace App\Delivery\Infrastructure\Services;

use App\Delivery\Domain\Entity\Parcel;
use App\Delivery\Domain\Interfaces\CalculateDeliveryInterface;

class CalculateDelivery implements CalculateDeliveryInterface
{

    private $priceLoader;

    /**
     * @param $priceLoader
     */
    public function __construct($priceLoader)
    {
        $this->priceLoader = $priceLoader;
    }

    /**
     * @param Parcel $parcel
     * @return float
     */
    public function calc(Parcel $parcel): float
    {
        $price = $this->priceLoader->load_parcel_price($parcel);
        return $price['parcel_type'] + $this->calculate_options($parcel);
    }

    /**
     * @param Parcel $parcel
     * @return float|int
     */
    public function calculate_options(Parcel $parcel)
    {
        $price = $this->priceLoader->load_parcel_price($parcel);
        return array_sum($price['options']);
    }
}