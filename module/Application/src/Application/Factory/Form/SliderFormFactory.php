<?php

namespace Application\Factory\Form;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Form\Slider;

class SliderFormFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $services         = $serviceLocator->getServiceLocator();
        $entityManager    = $services->get('Doctrine\ORM\EntityManager');
         
        $form = new Slider($entityManager);
        return $form;
    }

}
