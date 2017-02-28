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

            foreach ($form as $element) {
                if ($element instanceof \Zend\Form\Element\File) {
                    $methodGet = 'get' . ucfirst($element->getName());
                    $methodSet = 'set' . ucfirst($element->getName());
                    if (method_exists($entity, "get".$element->getName())) {
                        if ($foto != NULL && empty($entity->$methodGet()['tmp_name'])) {
                            foreach ($foto as $key => $valor) {
                                if ($key == $methodGet) {
                                    if ($entity->getId() > 0) {
                                        $entity->$methodSet($valor);
                                    }
                                }
                            }
                        } else {
                            if (is_array($entity->$methodGet()) && !empty($entity->$methodGet()['tmp_name'])) {
                                $methodoSet = 'set' . ucfirst($element->getName());
                                $entity->$methodoSet(substr($entity->$methodGet()['tmp_name'], 14));
                            }
                        }
                    } else {
                        return "Method $methodGet não Existe !!!";
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
