<?php

namespace App\Delivery\Domain\Entity;

class Parcel
{
    const PARCEL_TYPE_LETTER = 'letter';
    const PARCEL_TYPE_BOX = 'box';
    const PARCEL_TYPE = [self::PARCEL_TYPE_BOX, self::PARCEL_TYPE_LETTER];

    private string $description;
    private string $parcel_type;
    private Options $options;

    public function getParcelType(): string
    {
        return $this->parcel_type;
    }

    public function setParcelType(string $parcel_type): void
    {
        $this->parcel_type = $parcel_type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getOptions(): Options
    {
        return $this->options;
    }

    public function setOptions(Options $options): void
    {
        $this->options = $options;
    }
}
