<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class postController extends Controller
{
    public function postAction()
    {
        return $this->render('EventEventBundle:Blog:blog:post.html.twig');
    }
}
