<?php

namespace Event\EventBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FormGame extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                  'attr' => array(
                      'placeholder' => 'Nom du jeu',)
                   ))
            ->add('description', 'textarea')
            ->add('valider', 'submit');
    }

    public function getName()
    {
        return 'eventbundle_addGame';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Event\EventBundle\Entity\jeu'
        ));
    }
}