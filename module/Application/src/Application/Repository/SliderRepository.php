<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Repository;

use Doctrine\ORM\EntityRepository;

class SliderRepository extends EntityRepository {

    public function MaxOrder() {
        $select = $this->createQueryBuilder('m')
                ->select('MAX(m.orderexibir)')
                ->setMaxResults(1)
                ->getQuery()
                ->getResult();

        $max = $select[0][1];
        if (isset($max)) {
            return $max + 1;
        } else {
            return 1;
        }
    }

    public function getContinent() {
        $querybuilder = $this->createQueryBuilder('c');
        return $querybuilder->select('c')
                        ->orderBy('c.id', 'ASC')
                        ->getQuery()->getResult();
    }

}
