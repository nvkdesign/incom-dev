<?php
namespace Utilisateurs\UtilisateursBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // add your custom field
        $builder
            ->add('name', 'text')
            ->add('imageFile', 'vich_image', array(
                'required'      => false,
                'allow_delete'  => false, // not mandatory, default is true
                'download_link' => false, // not mandatory, default is true
            ))
            ->add('prenom', 'text')
            ->add('pays', 'choice', array(
                'choices' => array('France' => 'France', 'Belgique' => 'Belgique', 'Suisse' => 'Suisse'),
                'preferred_choices' => array('France'),
            ))
            ->add('dateanniversaire', 'birthday', array(
                'widget' => 'choice',
                'format' => 'dd MM yyyy',));
    }

    public function getParent()
    {
        return 'fos_user_profile';
    }

    public function getName()
    {
        return 'utilisateurs_user_profile';
    }
}