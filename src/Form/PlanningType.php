<?php

namespace App\Form;

use App\Entity\Planning;
use App\Entity\Centre;
use App\Entity\User;
use App\Entity\Statut;
use App\Entity\StatutAgent;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_planning')
            ->add('plan_heure_am_debut')
            ->add('plan_heure_am_fin')
            ->add('plan_heure_pm_debut')
            ->add('plan_heure_pm_fin')
            ->add('centre', EntityType::class, [
                'class' => Centre::class,       
                'choice_label' => 'nom_centre'
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,       
                'choice_label' => 'prenom'
            ])           
            /*
            ->add('statut_agent', EntityType::class, [
                'class' => StatutAgent::class,       
                'choice_label' => 'date_debut'
            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
        ]);
    }
}
