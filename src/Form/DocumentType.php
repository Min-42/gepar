<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Entreprise;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label' => false, 
                'attr' => ['placeholder' => 'Type de fichier',
                ]])
            ->add('fichier', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Lien vers le fichier',
                ]])
            ->add('extension', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Extension du fichier (pdf, doc ...)',
                ]])
            ->add('taille', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Taille du fichier',
                ]])
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'choice_label' => 'nom',
                'label' => false,
                'attr' => ['placeholder' => 'Identifiant de l\'entreprise',
                ]])
            ->add('attachedTo', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Attaché à',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
