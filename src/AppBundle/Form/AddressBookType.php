<?php

namespace AppBundle\Form;

use AppBundle\Entity\City;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressBookType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')->add('lastName')->add('street')->add('zip')->add('phoneNumber')->add('email')->add('picture')->add('country');
        $builder
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_attr' => function ($choice, $key, $value) {
                    /** @var City $choice */
                    return ['data-country-id' => $choice->getCountry()->getId()];
                },
            ])
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime'
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AddressBook'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_addressbook';
    }


}
