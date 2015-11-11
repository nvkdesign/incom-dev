<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Event\EventBundle\Form\Type\FormEvent;
use Symfony\Component\HttpFoundation\Request;
use Event\EventBundle\Entity\event;
use Event\EventBundle\Form\Type\FormValidate;
use Event\EventBundle\Form\Type\IdentityPicture;

class adminController extends Controller
{

    public function adminAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('EventEventBundle:event');

        $listEvent = $repository->findAll();
        $messageAction = "";
        return $this->render('EventEventBundle:Administration:admin.html.twig' , array(
            'listEvent' => $listEvent,
            'messageAction' => $messageAction
        ));
    }

    public function deleteAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EventEventBundle:event')->find($id);
        if (!$event) {
            echo "l'id n'existe pas";
        }

        $this->get('session')->getFlashBag()->add(
            'noticeDelete',
            'L\'evenement à été supprimé');

        $em->remove($event);
        $em->flush();

        return $this->redirect($this->generateUrl('event_event_admin'));
    }

    public function validateAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EventEventBundle:event')->find($id);
        if (!$event) {
            echo "L'id n'existe pas";
        }

        $formValidate = new FormValidate();
        $formValidate->eventencours = $event;

        $form = $this->createForm($formValidate, $event);
        $form->handleRequest($request);



        if ($form->isValid()) {

            $listePari = $event->getListparis();
            $teamWin = $event->getEquipegagnante();

             $coteWin = $this->cotewin($event);

            for ($i = 0; $i<count($listePari); $i++) {
                $pari = $listePari[$i];
                $user = $pari->getUser();
                $pointactuelleUser = $user->getPointsactuelle();
                $miseUser = $pari->getMise();
                $pariUser = $pari->getEquipeparie();
                if ($pariUser == $teamWin ) {

                    $pointWin = $miseUser * $coteWin;
                    $newpointUser = $pointactuelleUser + $pointWin;
                    $user->setPointsactuelle($newpointUser);
                    $em->persist($pari->getUser());
                }
            }

            $this->get('session')->getFlashBag()->add(
                'noticeValidate',
                'L\'evenement à été validé !');

            $em->flush();




            return $this->redirect($this->generateUrl('event_event_admin'));

        }
        return $this->render('EventEventBundle:Administration:validatePari.html.twig',
            array(
                'formValidate' => $form->createView(),
                'event' => $event,
                'actionForm'  => $this->generateUrl('event_event_admin_validate', array("id" => $id) )
            )

        );

    }


    public function coteWin($event){

        $equipe1 = $event->getEquipe1();
        $equipe2 = $event->getEquipe2();
        $coteTeam1 = $event->getCoteteam1();
        $coteTeam2 = $event->getCoteteam2();
        $teamWin = $event->getEquipegagnante();


        if ($equipe1 == $teamWin){
            $cotewin = $coteTeam1;
        }

        if ($equipe2 == $teamWin) {
            $cotewin = $coteTeam2;
        }

        return $cotewin;
    }
}
