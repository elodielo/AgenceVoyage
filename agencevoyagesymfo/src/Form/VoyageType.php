<?php

namespace App\Form;

use App\Entity\Endroit;
use App\Entity\ModaliteNuit;
use App\Entity\ModaliteTransport;
use App\Entity\User;
use App\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
        ->add('nom')
        ->add('nombreNuits')
        ->add('repasCompris')
        ->add('prixTotal')
        ->add('transportADestinationInclus')
        ->add('dateDebut', null, [
                'widget' => 'single_text'
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text'
                ])
            ->add('endroit', EntityType::class, [
                'class' => Endroit::class,
'choice_label' => 'nom',
])
->add('modaliteTransport', EntityType::class, [
    'class' => ModaliteTransport::class,
    'choice_label' => 'nom',
    ])
    ->add('modaliteNuit', EntityType::class, [
        'class' => ModaliteNuit::class,
        'choice_label' => 'nom',
        ])
        // ->add('user', EntityType::class, [
        //     'class' => User::class,
        //     'choice_label' => 'nom',
        //     ])
            ;
        }
        
        public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voyage::class,
        ]);
    }
}