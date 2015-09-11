<?php

namespace AnthillTendersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TendersController extends Controller
{
    public function indexAction($name)
    {
        $translated = $this->get('translator')->trans('welcome2');
        var_dump($translated);die;
        return $this->render('AnthillTendersBundle:Default:index.html.twig', array('name' => $name));
    }
}
