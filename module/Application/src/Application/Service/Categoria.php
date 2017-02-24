<?php

namespace Application\Service;

use Base\Service\AbstractService;

class Categoria extends AbstractService {

    public function updateOrdem(Array $ordem, $entity) {
        /* @var $em \Doctrine\ORM\EntityManager */

        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        $newOrdem = 1;
        try {
            foreach ($ordem as $key) {
                $select = $em->createQueryBuilder('s')
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
        
        

        return $em;
    }

}
