<?php

namespace App\Delivery\Infrastructure\Validator;

use App\Delivery\Domain\Entity\Parcel;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class IsParcelTypeExistValidator extends ConstraintValidator
{

    /**
     * @param $value
     * @param Constraint $constraint
     * @return void
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof IsParcelTypeExist) {
            throw new UnexpectedTypeException($constraint, IsParcelTypeExist::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!in_array($value, Parcel::PARCEL_TYPE)) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
