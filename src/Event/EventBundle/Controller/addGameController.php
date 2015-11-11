<?php

namespace Event\EventBundle\Controller;

use Event\EventBundle\Form\Type\FormGame;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Event\EventBundle\Entity\jeu;

class addGameController extends Controller
{

    public function AddGameAction(Request $request)
    {
        $form = $this->createForm(new FormGame(), new jeu());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $jeu = $form->getData();

            $this->get('session')->getFlashBag()->add(
                'noticeAdd',
                'Le jeu à été ajouté !');

        $em = $this->getDoctrine()->getManager();
        $em->persist($jeu);
        $em->flush();
        return $this->redirect($this->generateUrl('event_event_admin'));
        }


            return $this->render('EventEventBundle:Administration:addGame.html.twig',
                array(
                    'FormGame' => $form->createView(),
                    'actionForm'   => $this->generateUrl('event_event_addTeam'),
                )

            );
    }
}
