<?php

namespace AnthillTendersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TendersController extends Controller
{
    public function indexAction()
    {
        return $this->render('AnthillTendersBundle:Tenders:index.html.twig', array('name' => 'test'));
    }
}
