<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Event\EventBundle\Form\Type\FormPari;

class eventController extends Controller
{
    public function eventAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EventEventBundle:event')->find($id);
        return $this->render('EventEventBundle:Event:event.html.twig', array(
                             'event' => $event
        ));
    }
}
