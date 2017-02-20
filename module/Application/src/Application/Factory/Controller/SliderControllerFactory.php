<?php

namespace Application\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Tutorial\Controller\CountriesController;

class SliderControllerFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator) {
        $services = $serviceLocator->getServiceLocator();
        $countryForm = $services->get('FormElementManager')->get('Application\Form\Slider');
        $controller = new CountriesController($countryForm);

        return $controller;
    }

}
