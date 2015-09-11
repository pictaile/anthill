<?php

namespace AnthillAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AnthillAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
