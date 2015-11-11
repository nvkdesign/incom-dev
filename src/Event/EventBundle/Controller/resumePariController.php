<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class resumePariController extends Controller
{

    public function resumePariAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('EventEventBundle:event')->find($id);


        $listePari = $event->getListparis();
        $teamWin = $event->getEquipegagnante();

        $totalgagnant=0;
        $totalperdant=0;
        $totalmisegagnant=0;
        $totalmiseperdu=0;
        $totalmise=0;

        for ($i = 0; $i<count($listePari); $i++) {
            $pari = $listePari[$i];
            $pariUser = $pari->getEquipeparie();
            $miseUser = $pari->getMise();

            if ($pariUser == $teamWin ) {

                $totalgagnant = $totalgagnant + 1;
                $totalmisegagnant = $totalmisegagnant + $miseUser;

            } else {

                $totalperdant = $totalperdant + 1;
                $totalmiseperdu = $totalmiseperdu + $miseUser;
            }

            $totalmise = $totalmisegagnant + $totalmiseperdu;



            $user = $pari->getUser();
           // echo $user->getName();
           // echo $user->getPrenom();
           // echo $user->getUsername();
           // echo $pari->getMise();
           // echo $pari->getEquipeparie()->getnom();

        }


        return $this->render('EventEventBundle:Administration:resumepari.html.twig',
            array(
                'listePari' => $listePari,
                'event' => $event,
                'pari' => $pari,
                'totalperdant' => $totalperdant,
                'totalgagnant' => $totalgagnant,
                'totalmisegagnant' => $totalmisegagnant,
                'totalmiseperdu' => $totalmiseperdu,
                'totalmise' => $totalmise
            ));
    }


}
