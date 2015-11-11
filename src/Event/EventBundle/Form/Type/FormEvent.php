<?php

namespace Event\EventBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FormEvent extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
                  'attr' => array(
                      'placeholder' => 'Millenium VS Fnatic',)
                   ))
            ->add('datefinpari', 'datetime')
            ->add('description', 'textarea')
            ->add('coteteam1','number', array(
                  'attr'=> array(
                      'placeholder' => '1,234...'
                  )
            ))
            ->add('coteteam2', 'number', array(
                  'attr'=> array(
                      'placeholder'=> '1,093...'
                  )
            ))
            ->add('jeu', 'entity', array(
                'class' => 'EventEventBundle:jeu',
                'property' => 'nom'
            ))
            ->add('equipe1', 'entity', array(
                  'class' => 'EventEventBundle:equipe',
                  'property' => 'nom'
            ))
            ->add('equipe2', 'entity', array(
                'class' => 'EventEventBundle:equipe',
                'property' => 'nom'
            ))
            ->add('etat', 'choice', array(
            'choices' => array('brouillon' => 'Brouillon', 'valider' => 'Valider', 'parisOuvert' => 'Paris Ouvert', 'parisFerme' => 'Paris Fermé', 'termine' => 'Terminé', 'archive' => 'Archive'),
            'preferred_choices' => array('brouillon'),
        ))
            ->add('valider', 'submit');
    }

    public function getName()
    {
        return 'eventbundle_eventAll';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Event\EventBundle\Entity\event',
            'data_class2' => 'Event\EventBundle\Entity\equipe'
        ));
    }
}