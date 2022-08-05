<?php

namespace App\Form;

use App\Entity\Lieu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', ChoiceType::class, [
                'label' => 'Lieu',
                'choices' => [
                    'Paris' => 'Paris',
                    'Bordeaux' => 'Bordeaux',
                    'Rennes' => 'Rennes',
                    'Nantes' => 'Nantes',
                    'Lyon' => 'Lyon',
                    'Marseille' => 'Marseille'
                ],
                'multiple'=> false
            ])
            ->add('rue')
            ->add('latitude')
            ->add('longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
