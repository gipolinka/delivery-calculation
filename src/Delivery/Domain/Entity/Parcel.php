<?php

namespace App\Delivery\Domain\Entity;

use App\Delivery\Domain\Entity\Options;

class Parcel
{
    const PARCEL_TYPE_LETTER = 'letter';
    const PARCEL_TYPE_BOX = 'box';
    const PARCEL_TYPE = [self::PARCEL_TYPE_BOX, self::PARCEL_TYPE_LETTER];

    private string $description;
    private string $parcel_type;
    private Options $options;

    /**
     * @return string
     */
    public function getParcelType(): string
    {
        return $this->parcel_type;
    }

    /**
     * @param string $parcel_type
     */
    public function setParcelType(string $parcel_type): void
    {
        $this->parcel_type = $parcel_type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Options
     */
    public function getOptions(): Options
    {
        return $this->options;
    }

    /**
     * @param Options $options
     */
    public function setOptions(Options $options): void
    {
        $this->options = $options;
    }
}