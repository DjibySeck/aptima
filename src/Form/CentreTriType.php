<?php

namespace App\Form;

use App\Entity\CentreTri;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentreTriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            ->add('nom_centre')
            ->add('groupe')
            ->add('tri_lieu')
            ->add('tri_heure_am_debut')
            ->add('tri_heure_am_fin')
            ->add('tri_heure_pm_debut')
            ->add('tri_heure_pm_fin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CentreTri::class,
        ]);
    }
}
