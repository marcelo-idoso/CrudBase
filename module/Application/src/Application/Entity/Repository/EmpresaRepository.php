<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class EmpresaRepository extends EntityRepository{
    
    public function getEmpresa() {
        $select = $this->createQueryBuilder ('s');
        $select->select('s.pempresa');
            $select->where('s.pempresa IS NOT NULL');
        $select->getMaxResults(1);
        $return = $select->getQuery()->getResult();
        
        if (isset($return[0])){
            return $return[0];
        }
        
    }
    
    public function getServico() {
        $select = $this->createQueryBuilder ('s');
        $select->select('s.pservicos');
            $select->where('s.pservicos IS NOT NULL');
        $select->getMaxResults(1);
        $return = $select->getQuery()->getResult();
        
        if (isset($return[0])){
            return $return[0];
        }
        
    }
    
    public function getContato() {
        $select = $this->createQueryBuilder ('s');
        $select->select('s.pcontatos');
            $select->where('s.pcontatos IS NOT NULL');
        $select->getMaxResults(1);
        $return = $select->getQuery()->getResult();
        
        if (isset($return[0])){
            return $return[0];
        }
        
    }
}
