<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class indexController extends Controller
{
    public function indexAction()
    {
        return $this->render('EventEventBundle:Default:index.html.twig');
    }
}
