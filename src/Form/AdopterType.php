<?php

namespace App\Form;

use App\Entity\Adopter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class AdopterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class )
            ->add('description', TextareaType::class)
            ->add('adoptersFile', VichImageType::class, [
                'required'      => true,
                'allow_delete'  => false,
                'download_uri' => false,
                
    ])
            ->add('adoptionDate', DateType::class , [
                'widget' => 'single_text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adopter::class,
        ]);
    }
}
