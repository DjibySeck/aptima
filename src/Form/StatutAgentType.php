<?php

namespace App\Form;

use App\Entity\StatutAgent;
use App\Entity\User;
use App\Entity\Statut;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class StatutAgentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_debut', DateTimeType::class)
            ->add('date_fin', DateTimeType::class)
            ->add('statut', EntityType::class, [
                'class' => Statut::class,       
                'choice_label' => 'etat'
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,       
                'choice_label' => 'prenom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StatutAgent::class,
        ]);
    }
}
