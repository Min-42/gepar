<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Document;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

//use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeSiren', TextType::class, [
                'label' => false, 
                'attr' => ['placeholder' => 'Code Siren de l\'entreprise',
                ]])
            ->add('nom', TextType::class, [
                'label' => false, 
                'attr' => ['placeholder' => 'Nom de l\'entreprise',
                ]])
            ->add('groupe', TextType::class, [
                'label' => false, 
                'required' => false,
                'attr' => ['placeholder' => 'Groupe auquel elle appartient',
                ]])
            ->add('contacts', TextareaType::class, [
                'label' => false, 
                'required' => false,
                'attr' => ['placeholder' => 'Contacts dans l\'entreprise',
                ]])
            ->add('conventionCollective', TextType::class, [
                'label' => false, 
                'required' => false,
                'attr' => ['placeholder' => 'ID de la CCN',
                ]])
            ->add('trancheEffectif', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Tranche d\'effectifs connus',
                ]])
            ->add('nbAdherents', IntegerType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Nombre d\adhérents dans l\'entreprise',
                ]])
            ->add('notes', TextareaType::class, [
                'label' => false, 
                'required' => false,
                'attr' => ['placeholder' => 'Notes diverses concernant l\'entreprise',
                ]])
            ->add('documents', CollectionType::class, [
                'entry_type' => Document::class,
                'entry_options' => [
                    'label' => false,
                ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
