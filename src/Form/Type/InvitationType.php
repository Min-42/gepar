<?php

namespace App\Form\Type;

use App\Entity\Invitation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvitationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEnvoi')
            ->add('dateReception')
            ->add('datesReunion')
            ->add('adresse')
            ->add('perimetre')
            ->add('negociation')
            ->add('notes')
            ->add('entreprise')
            ->add('documents')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Invitation::class,
        ]);
    }
}
