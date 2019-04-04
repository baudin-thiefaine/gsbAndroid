<?php

namespace AndroidBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AndroidBundle:Default:index.html.twig');
    }
}
