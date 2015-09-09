<?php

namespace AnthillStartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AnthillStartBundle:Start:index.html.twig', array('name' => 'test'));
    }
}
