<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('age')
            ->add('race')
            ->add('picture')
            ->add('vaccinate')
            ->add('sterilized')
            ->add('puced')
            ->add('castration')
            ->add('tatoo')
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
            //  ->add('messages')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animaux::class,
        ]);
    }
}
