<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Event\EventBundle\Form\Type\FormPari;

class listEventsController extends Controller
{
    public function listEventsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $listEvent = $em->getRepository('EventEventBundle:event')->findAll();



        return $this->render('EventEventBundle:Event:listevents.html.twig',
        array('listEvent' => $listEvent
        ));
    }
}
