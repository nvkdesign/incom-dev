<?php

namespace Event\EventBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FormPari extends AbstractType
{

    public $eventencours;
    public $user;


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('equipeparie', 'entity', array(
                'class' => 'EventEventBundle:equipe',
                'property' => 'nom',
                'query_builder' => function(EntityRepository $er) {
                    $qb = $er->createQueryBuilder('e') //e= equipe
                             ->where('e.id = :equipe1')
                             ->orWhere('e.id = :equipe2')
                             ->setParameter('equipe1', $this->eventencours->getEquipe1()->getId())
                             ->setParameter('equipe2', $this->eventencours->getEquipe2()->getId());

                    return $qb;
                }
            ))
            ->add('mise', 'integer')
            ->add('valider', 'submit');

    }

    public function getName()
    {
        return 'eventbundle_eventPari';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Event\EventBundle\Entity\pari'
        ));
    }
}