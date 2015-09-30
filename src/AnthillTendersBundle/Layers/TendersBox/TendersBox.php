<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 30.09.15
 * Time: 9:40
 */


namespace AnthillTendersBundle\Layers\TendersBox;

class TendersBox{

    private $request;

    private $em;

    private $paginator;

    private $page;

    private $max_count;

    private $data;

    public function setParams($container, $page, $data=[]){
        $this->request = $container->get('request');
        $this->em = $container->get('doctrine.orm.entity_manager');
        $this->paginator  = $container->get('knp_paginator');
        $this->page = $page;
        $this->data = $data;
        $this->max_count =  $container->getParameter('knp_paginator_max_count');
    }

    public function getMaxCount(){
        return $this->max_count;
    }

    public function getRequest(){
        return $this->request;
    }

    public function getEntity(){
        return $this->em;
    }

    public function getPaginator(){
        return  $this->paginator;
    }

    public function getPage(){
        return $this->page;
    }

    public function getData(){
        return $this->data;
    }
}