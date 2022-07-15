<?php

declare(strict_types=1);

namespace RacoonAccess\List\Form\Type;

use RacoonAccess\List\Entity\Basket;
use RacoonAccess\List\Entity\ListItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class ListItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'constraints' => [
                    new NotNull(),
                ],
            ])
            ->add('products', EntityType::class, [
                'class' => Basket::class,
                'multiple' => true,
                'constraints' => [
                    new NotNull(),
                ],
            ])
            ->add('dateTime', DateTimeType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotNull(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cart::class,
        ]);
    }
}
