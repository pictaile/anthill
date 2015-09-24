<?php

namespace AnthillTendersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AnthillTendersBundle\Model\TendersModel;

class TendersController extends Controller
{
    public function indexAction($page=1)
    {
        $model = new TendersModel($this->container);
        $pagination = $model->getPaginationTenders($page);
        return $this->render('AnthillTendersBundle:Tenders:index.html.twig',  array('pagination' => $pagination));
    }
}
