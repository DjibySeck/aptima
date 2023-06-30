<?php

namespace App\Form;

use App\Entity\ReseauIncendie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReseauIncendieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('nom_centre')
            ->add('groupe')
            ->add('incendie_num_borne')
            ->add('incendie_latitude')
            ->add('incendie_longitude')
            ->add('incendie_description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReseauIncendie::class,
        ]);
    }
}
