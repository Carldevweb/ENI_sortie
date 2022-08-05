<?php

namespace App\Form;

use App\Entity\ProfilUtilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;


class FormulaireProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Pseudo', TextType::class)
            ->add('Prenom')
            ->add('Nom')
            ->add('Telephone', NumberType::class)
            ->add('Email', EmailType::class)
            ->add('ConfirmationMotDePasse', RepeatedType::class, [
                // Ajouts pour le type Repeated
                // Doivent être placés au début
                'type' => PasswordType::class,
                'invalid_message' => 'Les valeurs pour les champs mots de passe doivent être identiques.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Répétez le mot de passe'],

                    'mapped' => false,
                    'attr' => ['autocomplete' => 'new-password'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Mot de passe obligatoire',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Le mot de passe doit avoir une longueur minimum de {{ limit }} caractères.',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),

                        new Regex(
                            [
                                'pattern' => '/"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"/',
                                'message' => 'Le mot de passe doit contenir au moins une minuscule, une majuscule, un chiffre et un caractère spécial (autorisé : @, $, !, %, *, #, ?, &)'
                            ]
                        )
                    ],
                ]

            )
            ->add('Campus', ChoiceType::class,[
                'choices' => [
                    'Paris' => 'Paris',
                    'Bordeaux' => 'Bordeaux',
                    'Rennes' => 'Rennes',
                    'Nantes' => 'Nantes',
                    'Lyon' => 'Lyon',
                    'Marseille' => 'Marseille'
                ],
                'multiple'=> false,
                'label' => 'Campus'
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