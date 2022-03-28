<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnimauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('age', NumberType::class)
            ->add('race', TextType::class)
            ->add('vaccinate', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'multiple' => false
                
            ])
            ->add('sterilized', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('puced', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('castration', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('tatoo', ChoiceType::class, [
                'choices' => [
                    'Yes' => true,
                    'No' => false
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Mâle' => 'Mâle',
                    'Femelle' => 'Femelle'
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name'
            ])
            ->add('animalFile', VichImageType::class, [
                'required' => false,
                'allow_delete'  => false,
                'download_uri' => false,
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animaux::class,
        ]);
    }
}


 