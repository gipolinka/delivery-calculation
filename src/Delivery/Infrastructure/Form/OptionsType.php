<?php

namespace App\Delivery\Infrastructure\Form;

use App\Delivery\Domain\Entity\Options;
use App\Delivery\Infrastructure\Validator\IsOptionExist;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('size', TextType::class, [
            'constraints' => new IsOptionExist(['option' => 'size'])])
            ->add('delivery_type', TextType::class, [
                'constraints' => new IsOptionExist(['option' => 'delivery_type'])])
            ->add('receive_type', TextType::class, [
                'constraints' => new IsOptionExist(['option' => 'receive_type'])]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => Options::class]
        );
    }
}
