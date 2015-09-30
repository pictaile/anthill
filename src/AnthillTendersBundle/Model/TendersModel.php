<?php
/**
 * Created by PhpStorm.
 * User: kostya ochotnik
 * Date: 24.09.15
 * Time: 10:51
 */

namespace AnthillTendersBundle\Model;

use AnthillTendersBundle\Layers\TendersBox\TendersBox;

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

    public function getPaginationTenders($data){
        $TenderBox = new TendersBox();
        $page = $this->checkPage($data);
        $data = $this->dataTrim($data);
        $TenderBox->setParams( $this->container,$page,$data);
        return $this->getTenders($TenderBox);
    }

    private function checkPage(&$data){
        if(isset($data['page']) ) {
            $page = $data['page'];
            unset($data['page']);
            return $page;
        }
        return 1;
    }

    private function dataTrim($data){
        foreach($data as $key => $value){
            if($data[$key] == ''){
                unset($data[$key]);
            }
        }
        return $data;
    }

    private function getTenders($TenderBox){
        $data = $TenderBox->getData();
        if(empty($data)){
            return $this->entity->getRepository('AnthillTendersBundle:Tenders')
                ->getTendersPaginatorAll($TenderBox);
        }
        return $this->entity->getRepository('AnthillTendersBundle:Tenders')
            ->getTendersPaginator($TenderBox);
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