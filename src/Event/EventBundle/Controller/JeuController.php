<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JeuController extends Controller
{
    public function jeuAction()
    {
        return $this->render('EventBundle:Default:admin.html.twig');
    }
}
