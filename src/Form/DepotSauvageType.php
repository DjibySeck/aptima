<?php

namespace App\Form;

use App\Entity\DepotSauvage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepotSauvageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('nom_centre')
            ->add('groupe')
            ->add('depot_description')
            ->add('depot_latitude')
            ->add('depot_longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DepotSauvage::class,
        ]);
    }
}
