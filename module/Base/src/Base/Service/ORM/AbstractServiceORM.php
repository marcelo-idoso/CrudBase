<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Service\ORM;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Base\EventManager\EventProvider;

class AbstractServiceORM extends EventProvider implements ServiceLocatorAwareInterface{
    
    use ServiceLocatorAwareTrait;
    
    
    public function save($form, $entity){
        
        if ($form->isValid()){
            /* @var $form \Zend\Form\Form */
           $entity = $form->getData();
        }else{
            return False ;
        }
        
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        
        if ($entity->getId() > 0) {
            $entity = $em->merge($entity);
        }
        try {
            $em->persist($entity);
            $em->flush();
        } catch (\Exception $e) {
            /* @var $e \Exception */
            $mensage = $e->getMessage();
            return $mensage;
        }
        
        return $entity;
        
        
        
    }
    
    

//put your code here
}
