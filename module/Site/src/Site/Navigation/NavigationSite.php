<?php

namespace Site\Navigation;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Navigation\Service\DefaultNavigationFactory;

class NavigationSite extends DefaultNavigationFactory {

    /**
     * @return string
     */
    protected function getName() {
        return 'navigationSite';
    }

    protected function getPages(ServiceLocatorInterface $serviceLocator) {
        $navigation = array();
        if (null === $this->pages) {
            $navigation = $serviceLocator->get('Doctrine\ORM\EntityManager')
                    ->getRepository('Application\Entity\Categoria')
                    ->listView();
            if($navigation != NULL) {

                $mvcEvent = $serviceLocator->get('Application')
                        ->getMvcEvent();
                $routeMatch = $mvcEvent->getRouteMatch();
                $router = $mvcEvent->getRouter();
                $pages = $this->getPagesFromConfig($navigation);

                $this->pages = $this->injectComponents(
                        $pages, $routeMatch, $router
                );
            }
        }
        return $this->pages;
    }

}
