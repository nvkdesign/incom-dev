<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Event\EventBundle\Entity\event;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use Event\EventBundle\Form\Type\FormPari;
use Event\EventBundle\Entity\pari;

class PariController extends Controller
{
    public function PariAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('EventEventBundle:event')->find($id);
        $user = $this->getUser();

        if (!$event) {
            echo "L'id n'existe pas";
        }
        $message = '';
        $formPari = new FormPari();
        $formPari->eventencours = $event;
        $formPari->user = $user;

        $pari = new pari();
        $pari->setUser($user);
        $pari->setEvent($event);

        $form = $this->createForm($formPari, $pari);
        $form->handleRequest($request);
        if ($form->isValid()) {

            if (! $this->premierPari($em, $user, $event)) {

                $message = 'Vous avez déja fait un pari';

            } else {


                $pointuser = $pari->getMise();
                $pointactuelle = $pari->getUser()->getPointsactuelle();

                if ($pointactuelle < $pointuser) {

                    $message = 'vous n\'avez pas assez de points';

                } else {
                    $pari->getUser()->setPointsactuelle($pointactuelle - $pointuser);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($pari);
                    $em->flush();
                }

            }
        }
        return $this->render('EventEventBundle:Event:event.html.twig',
            array(
                'formPari' => $form->createView(),
                'event' => $event,
                'message' => $message ,
                'actionForm'  => $this->generateUrl('event_event_event', array("id" => $id) )
            )

        );

    }

    public function premierPari($em, $user, $event) {


        $userid = $user->getId();
        $eventid = $event->getId();

        $query = $em->createQuery("SELECT p FROM Event\EventBundle\Entity\pari p
                                   JOIN p.user u
                                   JOIN p.event e
                                   WHERE u.id = $userid
                                   AND e.id = $eventid");
        $pari = $query->getResult();


        $premierPari = count($pari);

        if ($premierPari > 0){

            return false;
        } else {
            return true;
        }

    }

}
