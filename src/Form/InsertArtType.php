<?php

namespace App\Form;

use App\Entity\Art;
use Assert\NotNull;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InsertArtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture_link', FileType::class, [
                'attr' => [
                    'class' > 'form-control'
                ],
                'label' => 'Insérer l\'illustration',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                
                'constraints' => [
                    new Image(),
                ]
            ])
            ->add('date', null, [
                'widget' => 'single_text',
                'attr' => [
                    'class' > 'form-control'
                ],
                'label' => 'Date de l\'illustration',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('type', TextType::class, [
                'attr' => [
                    'class' > 'form-control'
                ],
                'label' => 'Type d\'illustration',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'class' > 'form-control'
                ],
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'required' => false
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-dark mt-4'
                ],
                'label' => 'Ajouter',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Art::class,
        ]);
    }
}
