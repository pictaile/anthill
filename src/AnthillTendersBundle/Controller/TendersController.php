<?php

namespace AnthillTendersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use AnthillTendersBundle\Model\TendersModel;

class TendersController extends Controller
{
//    public function indexAction($page = 1)
//    {
//        $model = new TendersModel($this->container);
//        $result = $this->get('request')->query->all();
//        if(!isset($result['ajax'])){
//            return $this->render('AnthillTendersBundle:Tenders:index.html.twig',  array('pagination' => $model->getPaginationTenders($page)));
//        }
//        else{
//            $tpl = $this->render('AnthillTendersBundle:partial:tender_partial.html.twig',
//                array('pagination' =>  $model->getPaginationTenders($result['page'])));
//            return new JsonResponse([
//                'page' => $tpl->getContent()
//            ]);
//        }
//
//    }

    public function indexAction($page=1)
    {
        $model = new TendersModel($this->container);
        return $this->render('AnthillTendersBundle:Tenders:index.html.twig',
            array(
                'pagination' => $model->getPaginationTenders($page),
                'categories' => $model->getCategories()
            ));
    }

    public function indexAjaxAction()
    {
        $model = new TendersModel($this->container);
        $page = $this->get('request')->query->get('page');
        $pagination = $model->getPaginationTenders($page);var_dump($page);die();
        $tpl = $this->render('AnthillTendersBundle:partial:tender_partial.html.twig',
                                    array('pagination' => $pagination));
        return new JsonResponse([
            'page' => $tpl->getContent()
        ]);
    }

}
