<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class connectController extends Controller
{
    public function connectAction()
    {
        return $this->render('EventEventBundle:Administration:connect.html.twig');
    }


    public function resetAction()
    {
        return $this->render('EventEventBundle:Administration:resetPassword.html.twig');
    }
}
