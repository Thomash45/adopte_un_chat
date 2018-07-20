<?php

namespace App\Form;

use App\Entity\Announce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class AnnounceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('gender')
            ->add('year')
            ->add('description')
            ->add('adresse',TextType::class, array('attr' => array('onFocus' => 'geolocate()')))
            ->add('city',TextType::class, array('attr' => array('disabled' => 'true')))
            ->add('codePostal',TextType::class, array('attr' => array('disabled' => 'true')))
            ->add('departement',TextType::class, array('attr' => array('disabled' => 'true')))
            ->add('region',TextType::class, array('attr' => array('disabled' => 'true')))
            ->add('lat')
            ->add('lng')
            ->add('telephoneNumber')
            ->add('streetNumber')
            ->add('road')
            ->add('country')
            ->add('race')
            ->add('coatColor')
            ->add('coatStyleColor')
            ->add('coat')
            ->add('isPremium')
            ->add('imageFile', VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }
}
