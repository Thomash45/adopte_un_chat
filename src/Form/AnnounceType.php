<?php

namespace App\Form;

use App\Entity\Announce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnounceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('year')
            ->add('description')
            ->add('adresse')
            ->add('city')
            ->add('codePostal')
            ->add('departement')
            ->add('region')
            ->add('telephoneNumber')
            ->add('race')
            ->add('coatColor')
            ->add('coatStyleColor')
            ->add('coat')
            ->add('devisFile', 'file')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }
}
