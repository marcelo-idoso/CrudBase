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

class AbstractServiceORM extends EventProvider implements ServiceLocatorAwareInterface {

    use ServiceLocatorAwareTrait;

    public function save($form, $entity, $foto = null) {

        if ($form->isValid()) {
            /* @var $form \Zend\Form\Form */
            $entity = $form->getData();
            if (method_exists($entity, 'getImg')) {
                if (is_array($entity->getImg()) && !empty($entity->getImg()['tmp_name'])) {
                    if (is_file($foto) && $foto != NULL) {
                        unlink($foto);
                    } else {
                        $entity->setImg(substr($entity->getImg()['tmp_name'], 9));
                    }
                } else {
                    if ($entity->getId() > 0) {
                        $entity->setImg($foto);
                    } else {
                        $entity->setImg(NULL);
                    }
                }
            }
        } else {
            return False;
        }

        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

        if ($entity->getId() > 0) {

            try {
                $entity = $em->merge($entity);
            } catch (\Exception $exc) {
                $mensage = $e->getMessage();
                return $mensage;
            }
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

    public function delete($entity) {
        $em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        if ($entity->getId() > 0) {
            $id = $entity->getId();

            try {
                $em->remove($entity);
                $em->flush();
            } catch (\Exception $e) {
                $mensage = $e->getMessage();
                return $mensage;
            }
        }

        return $entity;
    }

}
