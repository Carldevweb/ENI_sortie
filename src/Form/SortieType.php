<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie :'
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'html5'=>true,
                'widget'=>'single_text',
                'label' => 'Date et heure de la sortie :',


            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée en Heure :'
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'html5' => true,
                'widget' => 'single_text',
                'label' => 'Date limite inscription :',

            ])
            ->add('nbInscriptionsMax', IntegerType::class, [
                'label' => 'Nombre de places :'
            ])
            ->add('infosSortie', TextType::class, [
                'label' => 'Description et infos :'
            ])
            ->add('etat', ChoiceType::class, [
                'label' => ' ',
                'attr'   =>  array(
                'class'   => 'etat'
                )
            ])

            ->add('sorties_lieu', LieuType::class, [
                'label' => ' '
            ])

            ->add('campus', CampusType::class, [
                'label' => ' '
            ])
            ->add('ville', VilleType::class, [
                'mapped' => false,
                'label' => ' '
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}