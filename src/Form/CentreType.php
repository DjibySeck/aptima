<?php

namespace App\Form;

use App\Entity\Centre;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CentreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('groupe')
            ->add('nom_centre')
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
            /*
            ->add('tri_lieu', EntityType::class,[
                'mapped' => false,
                'class' => CentreTri::class,
                'choice_label' => 'tri_lieu',
                'placeholder' => 'lieu de centre de tri',
                'label' => 'centre de tri'          
            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Centre::class,
        ]);
    }
}
