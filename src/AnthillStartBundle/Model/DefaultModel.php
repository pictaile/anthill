<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yuri
 * Date: 9/10/15
 * Time: 10:26 AM
 * To change this template use File | Settings | File Templates.
 */

namespace AnthillStartBundle\Model;


class DefaultModel {

    private $container;

    private $locale;

    private $entity;

    public function __construct($container){
        $this->container = $container;
        $this->entity = $this->container->get('doctrine')->getManager();
        $this->establishLocale();
    }


    private function establishLocale(){
        $this->locale = $this->container->get('request')->getLocale() ;

    }

    public function getComponentMenu(){
        $r = $this->entity->getRepository('AnthillStartBundle:StartMenu')
            ->getComponentMenuWithLocale($this->locale);
        foreach($r as $key =>$value){
            $r[$key]['name'] = $value['name_'.$this->locale];
            unset($r[$key]['name_'.$this->locale]);
        }
        return $r;
    }

}