<?php

namespace Event\EventBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class FormTeam extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
                  'attr' => array(
                      'placeholder' => 'Nom de l\'équipe',)
                   ))
            ->add('description', 'textarea')
            ->add('jeu', 'entity', array(
                'class' => 'EventEventBundle:jeu',
                'property' => 'nom'
                 ))
            ->add('valider', 'submit');
    }

    public function getName()
    {
        return 'eventbundle_addTeam';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Event\EventBundle\Entity\equipe'
        ));
    }
}