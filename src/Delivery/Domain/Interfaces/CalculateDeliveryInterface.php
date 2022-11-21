<?php

namespace App\Delivery\Domain\Interfaces;

use App\Delivery\Domain\Entity\Parcel;

interface CalculateDeliveryInterface
{
    /**
     * @param Parcel $parcel
     * @return mixed
     */
    public function calc(Parcel $parcel);

}