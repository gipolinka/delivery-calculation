<?php

namespace App\Delivery\Infrastructure\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Delivery\Domain\Entity\Parcel;

class LoadDeliveryPrice
{
    const PARCEL_PARAMETER_NAME = 'app.price.parcel';
    const SIZE_PARAMETER_NAME = 'app.price.size';
    const DELIVERY_TYPE_PARAMETER_NAME = 'app.price.delivery_type';
    const RECEIVE_PARAMETER_NAME = 'app.price.receive_type';
    const DEFAULT_VALUE = 0;

    /**
     * @var ParameterBagInterface
     */
    private ParameterBagInterface $parameterBag;

    /**
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }


    /**
     * @param Parcel $parcel
     * @return array
     */
    public function load_parcel_price(Parcel $parcel): array
    {
        return ['parcel_type' => $this->get_parcel_cost(
            $parcel->getParcelType(),
            self::PARCEL_PARAMETER_NAME),
            'options' => [
                'size' => $this->get_option_cost(
                    $parcel->getParcelType(),
                    $parcel->getOptions()->getSize(),
                    self::SIZE_PARAMETER_NAME),
                'delivery_type' => $this->get_option_cost(
                    $parcel->getParcelType(),
                    $parcel->getOptions()->getDeliveryType(),
                    self::DELIVERY_TYPE_PARAMETER_NAME),
                'receive_type' => $this->get_option_cost(
                    $parcel->getParcelType(),
                    $parcel->getOptions()->getReceiveType(),
                    self::RECEIVE_PARAMETER_NAME)
            ]];
    }

    /**
     * @param string $parcelType
     * @param string $parameter
     * @return float
     */
    private function get_parcel_cost(string $parcelType, string $parameter): float
    {
        return $this->parameterBag->has("$parameter.$parcelType") ?
            $this->parameterBag->get("$parameter.$parcelType") : self::DEFAULT_VALUE;
    }

    /**
     * @param string $parcelType
     * @param string $option
     * @param string $parameter
     * @return float
     */
    private function get_option_cost(string $parcelType, string $option, string $parameter): float
    {
        if ($this->parameterBag->has("$parameter.$option.$parcelType")) {
            return $this->parameterBag->get("$parameter.$option.$parcelType");
        }
        return $this->parameterBag->has("$parameter.$option") ?
            $this->parameterBag->get("$parameter.$option") : self::DEFAULT_VALUE;
    }
}