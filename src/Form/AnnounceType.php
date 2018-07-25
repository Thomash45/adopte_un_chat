<?php

namespace App\Form;

use App\Entity\Announce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
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
            ->add('city',HiddenType::class)
            ->add('codePostal',HiddenType::class)
            ->add('departement',HiddenType::class)
            ->add('region',HiddenType::class)
            ->add('telephoneNumber')
            ->add('streetNumber',HiddenType::class)
            ->add('road',HiddenType::class)
            ->add('country',HiddenType::class)
            ->add('race')
            ->add('coatColor')
            ->add('coatStyleColor')
            ->add('coat')
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'download_label' => '...',
                'download_uri' => true,
                'image_uri' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Announce::class,
        ]);
    }
}
