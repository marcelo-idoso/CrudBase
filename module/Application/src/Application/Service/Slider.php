<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Service;

use Base\Service\AbstractService;

class Slider extends AbstractService {

    public function updateOrdem(Array $ordem, $entity) {
        /* @var $em \Doctrine\ORM\EntityManager */

        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $newOrdem = 1;

        try {
            foreach ($ordem as $key) {
                $select = $em->createQueryBuilder()
                            ->update($entity, ' s')
                        ->set('s.orderexibir', '?1')
                        ->where('s.id = ?2')
                        ->setParameter(1, $newOrdem)
                        ->setParameter(2, $key)
                        ->getQuery()
                        ->execute();
                $newOrdem++;
            }
        } catch (\Exception $exc) {
            return $exc->getMessage();
        }


        return $newOrdem;
    }

}
