<?php

namespace App\Delivery\Infrastructure\Validator;

use Symfony\Component\Validator\Constraint;

class IsOptionExist extends Constraint
{
    public string $option = '';
    public string $message = 'Invalid options value';
}
