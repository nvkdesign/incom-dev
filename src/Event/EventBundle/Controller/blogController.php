<?php

namespace Event\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class blogController extends Controller
{
    public function blogAction()
    {
        return $this->render('EventEventBundle:Blog:blog.html.twig');
    }

    public function postAction()
    {
        return $this->render('EventEventBundle:Blog:blog-post.html.twig');
    }
}
