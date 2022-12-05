<?php

namespace App\Delivery\Infrastructure\Validator;

use Symfony\Component\Validator\Constraint;

class IsParcelTypeExist extends Constraint
{
    /**
     * @var string $message
     */
    public string $message = "is invalid parcel type value";
}
