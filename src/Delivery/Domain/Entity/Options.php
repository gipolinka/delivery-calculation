<?php

namespace App\Delivery\Domain\Entity;

class Options
{
    const SIZE_SMALL = 'small';
    const SIZE_MEDIUM = 'medium';
    const SIZE_LARGE = 'large';
    const SIZE = [self::SIZE_SMALL, self::SIZE_MEDIUM, self::SIZE_LARGE];

    const DELIVERY_TYPE_ORDINARY = 'ordinary';
    const DELIVERY_TYPE_INTERNATIONAL = 'international';
    const DELIVERY_TYPE = [self::DELIVERY_TYPE_ORDINARY, self::DELIVERY_TYPE_INTERNATIONAL];

    const RECEIVE_TYPE_ORDINARY = 'ordinary';
    const RECEIVE_TYPE_INTERNATIONAL = 'ordered';
    const RECEIVE_TYPE = [self::RECEIVE_TYPE_ORDINARY, self::RECEIVE_TYPE_INTERNATIONAL];

    const OPTIONS = [
        'size' => self::SIZE,
        'delivery_type' => self::DELIVERY_TYPE,
        'receive_type' => self::RECEIVE_TYPE
    ];

    private string $size;
    private string $delivery_type;
    private string $receive_type;

    public function getDeliveryType(): string
    {
        return $this->delivery_type;
    }

    public function setDeliveryType(string $delivery_type): void
    {
        $this->delivery_type = $delivery_type;
    }

    public function getReceiveType(): string
    {
        return $this->receive_type;
    }

    public function setReceiveType(string $receive_type): void
    {
        $this->receive_type = $receive_type;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(string $size): void
    {
        $this->size = $size;
    }
}
