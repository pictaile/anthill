<?php

namespace AnthillTendersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AnthillTendersBundle\Model\TendersModel;

class TendersController extends Controller
{
    public function indexAction()
    {
        $model = new TendersModel($this->container);
        $data = $this->get('request')->query->all();
        return $this->render('AnthillTendersBundle:Tenders:index.html.twig',
            array(
                'pagination' => $model->getPaginationTenders($data),
                'categories' => $model->getCategories()
            ));
    }

    public function indexAjaxAction()
    {
        $model = new TendersModel($this->container);
        $data = $this->get('request')->query->all();
        $pagination = $model->getPaginationTenders($data);
        $tpl = $this->render('AnthillTendersBundle:partial:tender_partial.html.twig',
                                    array('pagination' => $pagination));
        return new JsonResponse([
            'page' => $tpl->getContent()
        ]);
    }

}
