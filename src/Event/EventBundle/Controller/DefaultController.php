<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Event\EventBundle\Entity\equipe;
use Event\EventBundle\Entity\jeu;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EventEventBundle:default:index.html.twig');
    }

    public function adminAction()
    {
        return $this->render('EventEventBundle:Administration:admin.html.twig');
    }

}
