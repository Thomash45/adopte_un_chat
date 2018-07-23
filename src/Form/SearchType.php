<?php
// /src/Form/UserType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('adresse',TextType::class, array('attr' => array('onFocus' => 'geolocate()')))
            ->add('city',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('codePostal',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('departement',HiddenType::class, array('attr' => array('disabled' => 'true')))
            ->add('region',HiddenType::class, array('attr' => array('disabled' => 'true')));


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    public function getBlockPrefix()
    {
        return false;
    }
}