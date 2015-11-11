<?php

namespace Event\EventBundle\Controller;

use Event\EventBundle\Form\Type\FormEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Event\EventBundle\Entity\event;

class addPariController extends Controller
{

    public function AddPariAction(Request $request)
    {
        $form = $this->createForm(new FormEvent(), new event());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $event = $form->getData();

            $this->get('session')->getFlashBag()->add(
                'noticeAdd',
                'L\'evenement à été ajouté !');


            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirect($this->generateUrl('event_event_admin'));
        }

        return $this->render('EventEventBundle:Administration:addPari.html.twig',
            array(
                'formEvent' => $form->createView(),
                'pagetitle' => "Ajouter un Pari",
                'actionForm'   => $this->generateUrl('event_event_addPari'),
            )

        );

    }

    public function editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EventEventBundle:event')->find($id);
        if (!$event) {
            echo "L'id n'existe pas";
        }

        $form = $this->createForm(new FormEvent(), $event);

        $form->handleRequest($request);
        $this->get('session')->getFlashBag()->add(
            'noticeEdit',
            'L\'evenement à été édité !');
        if ($form->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('event_event_admin'));

        }
        return $this->render('EventEventBundle:Administration:addPari.html.twig',
            array(
                'formEvent' => $form->createView(),
                'pagetitle' => "Modifier un Pari",
                'actionForm'  => $this->generateUrl('event_event_addPari_edit', array("id" => $id) )
            )

        );

    }
}
