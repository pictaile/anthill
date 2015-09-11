<?php

namespace AnthillStartBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * StartMenuRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StartMenuRepository extends EntityRepository
{
    public function getAllComponentMenu(){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AnthillStartBundle:StartMenu p ORDER BY p.id ASC'
            )
            ->getResult();
    }

    public function getComponentMenuWithLocale($locale){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT p.name_$locale, p.href FROM AnthillStartBundle:StartMenu p ORDER BY p.id ASC"
            )
            ->getResult();
    }

}
