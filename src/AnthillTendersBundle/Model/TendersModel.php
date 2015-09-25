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
        $this->locale = $this->container->get('request')->getLocale() ;
    }

    public function getAllTenders(){
        return  $this->entity->getRepository('AnthillTendersBundle:Tenders')
            ->getAllTenders();
    }

    public function getPaginationTenders($page){
        return $this->entity->getRepository('AnthillTendersBundle:Tenders')
            ->getTendersPaginator($this->container,$page);
    }

    public function getCategories(){
        $response = $this->entity->getRepository('AnthillTendersBundle:TendersCategory')
            ->getAllCategories($this->locale);
        $result = [];
        foreach($response as $key =>$value){
            $result[$key]['name'] = $value['name_'.$this->locale];
            $result[$key]['id']   = $value['id'];

        }
        return $result;
    }
}