<?php

namespace App\Delivery\Infrastructure\Validator;

use App\Delivery\Domain\Entity\Options;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class IsOptionExistValidator extends ConstraintValidator
{

    /**
     * @param $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof IsOptionExist) {
            throw new UnexpectedValueException($constraint, IsOptionExist::class);
        }

        if (null === $value || '' === $value)
        {
            return;
        }

        if (!array_key_exists($constraint->option, Options::OPTIONS) ||
            !in_array($value, Options::OPTIONS[$constraint->option])) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
