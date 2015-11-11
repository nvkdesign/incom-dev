<?php

namespace Event\EventBundle\Controller;

use Event\EventBundle\Form\Type\FormTeam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Event\EventBundle\Entity\equipe;

class addTeamController extends Controller
{

    public function AddTeamAction(Request $request)
    {
        $form = $this->createForm(new FormTeam(), new equipe());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $equipe = $form->getData();

            $this->get('session')->getFlashBag()->add(
                'noticeAdd',
                'L\'equipe à été ajouté !');

        $em = $this->getDoctrine()->getManager();
        $em->persist($equipe);
        $em->flush();
        return $this->redirect($this->generateUrl('event_event_admin'));
        }


            return $this->render('EventEventBundle:Administration:addTeam.html.twig',
                array(
                    'FormTeam' => $form->createView(),
                    'actionForm'   => $this->generateUrl('event_event_addTeam'),
                )

            );
    }
}
