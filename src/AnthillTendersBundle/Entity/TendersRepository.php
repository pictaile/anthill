<?php

namespace AnthillTendersBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TendersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TendersRepository extends EntityRepository
{
    const MAX_ELEMENT_PAGE = 1;

    public function getAllTenders(){
        return $this->getEntityManager()
            ->createQuery(
            'SELECT p FROM AnthillTendersBundle:Tenders p ORDER BY p.id DESC'
            )->getArrayResult();
    }

    public function getTendersPaginator($container, $page){
        $request = $container->get('request');
        $em    = $container->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AnthillTendersBundle:Tenders a";
        $query = $em->createQuery($dql);
        $paginator  = $container->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', $page),
            $container->getParameter('knp_paginator_max_count')
        );
        $pagination->setUsedRoute('anthill_tenders_homepage');

        return $pagination;

    }
}
