<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\StatutAgent;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Doctrine\ORM\EntityRepository;



class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
           // ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            /*
            ->add('statut_agent',EntityType::class, [
                'mapped' => false,
                'class'=>StatutAgent::class,
                'choice_label'=>"date_debut",
                'placeholder' => 'statut agent',
                'label' => 'Agent'

            ])
            */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
