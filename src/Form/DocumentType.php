<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Type de fichier']])
            ->add('fichier', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Lien vers le fichier']])
            ->add('extension', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Extension du fichier (pdf, doc ...)']])
            ->add('taille', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Taille du fichier']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
