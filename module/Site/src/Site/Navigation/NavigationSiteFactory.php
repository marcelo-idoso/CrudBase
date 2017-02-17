<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Site\Navigation;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;



class NavigationSiteFactory implements FactoryInterface {

     public function createService(ServiceLocatorInterface $serviceLocator) {
        $navigation = new NavigationSite();
        return $navigation->createService($serviceLocator);
    }

}
