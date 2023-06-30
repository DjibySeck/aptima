<?php

namespace App\Form;

use App\Entity\Dechetterie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DechetterieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('nom_centre')
            ->add('groupe')
            ->add('dech_nom')
            ->add('dech_tel')
            ->add('dech_heure_am_debut')
            ->add('dech_heure_am_fin')
            ->add('dech_heure_pm_debut')
            ->add('dech_heure_pm_fin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Dechetterie::class,
        ]);
    }
}
