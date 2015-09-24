<?php

namespace AnthillStartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AnthillStartBundle\Model\DefaultModel;


class DefaultController extends Controller
{
    public function indexAction()
    {
          return $this->redirectToRoute('anthill_start_homepage',['_locale'=>'ru']);
    }


    public function startAction()
    {
        $model = new DefaultModel($this->container);
        return $this->render('AnthillStartBundle:Start:index.html.twig', [
            'menu' => $model->getComponentMenu()
        ]);
    }

}
