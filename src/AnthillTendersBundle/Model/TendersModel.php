<?php
/**
 * Created by PhpStorm.
 * User: kostya ochotnik
 * Date: 24.09.15
 * Time: 10:51
 */

namespace AnthillTendersBundle\Model;


class TendersModel{

    public function __construct($container){
        $this->container = $container;
        $this->entity = $this->container->get('doctrine')->getManager();
    }

    public function getAllTenders(){
        return  $this->entity->getRepository('AnthillTendersBundle:Tenders')
            ->getAllTenders();

    }

    public function getPaginationTenders($page){
        $request = $this->container->get('request');
        return $this->entity->getRepository('AnthillTendersBundle:Tenders')
            ->getTendersPaginator($this->container,$page);

    }
}