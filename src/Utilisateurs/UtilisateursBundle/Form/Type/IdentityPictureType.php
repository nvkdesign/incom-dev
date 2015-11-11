<?php
namespace Utilisateurs\UtilisateursBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class IdentityPictureType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('file')
        ;
    }
    public function getName()
    {
        return 'Utilisateurs_UtilisateursBundle_identitypicturetype';
    }
}