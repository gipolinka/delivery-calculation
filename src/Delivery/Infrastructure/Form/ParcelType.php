<?php

namespace App\Delivery\Infrastructure\Form;

use Symfony\Component\Form\{AbstractType, Extension\Core\Type\TextType, FormBuilderInterface};
use App\Delivery\Domain\Entity\Parcel;
use App\Delivery\Infrastructure\Validator\IsParcelTypeExist;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ParcelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('parcel_type', TextType::class, [
                'constraints' => new IsParcelTypeExist()
            ])
            ->add('options', OptionsType::class, [
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Parcel::class
        ]);
    }
}