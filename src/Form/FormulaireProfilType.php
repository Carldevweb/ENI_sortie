<?php

namespace App\Form;

use App\Entity\ProfilUtilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Pseudo', TextType::class)
            ->add('Prenom')
            ->add('Nom')
            ->add('Telephone')
            ->add('Email', EmailType::class)
            ->add('MotDePasse', PasswordType::class)
            ->add('ConfirmationMotDePasse', PasswordType::class)
            ->add('Campus', ChoiceType::class,[
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

            ->add('MaPhoto', FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilUtilisateur::class,
        ]);
    }
}
