<?php

namespace Site;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ViewHelperProviderInterface {

    public function onBootstrap($e) {

        // Configuração para Varios Layouts 
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));

            $moduleNamespace;
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                $controller->layout($config['module_layouts'][$moduleNamespace]);
            }
        }, 100);

        //Aqui eu declaro o Helper Manager
        $sm = $e->getApplication()->getServiceManager();
        $sm->get('viewhelpermanager')->setFactory('render_Slider', function ($sm) use ($e) {
            return new View\Helper\Slider($e, $sm);
        });
        $sm->get('viewhelpermanager')->setFactory('render_Categoria', function ($sm) use ($e) {
            return new View\Helper\Categoria($e, $sm);
        });
        $sm->get('viewhelpermanager')->setFactory('render_Parceiros', function ($sm) use ($e) {
            return new View\Helper\Parceiros($e, $sm);
        });
        $sm->get('viewhelpermanager')->setFactory('render_Ultimas_Noticas', function ($sm) use ($e) {
            return new View\Helper\UltimasNoticias($e, $sm);
        });
        $sm->get('viewhelpermanager')->setFactory('render_Empresa', function ($sm) use ($e) {
            return new View\Helper\Empresa($e, $sm);
        });
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                 'navigationSite' => 'Site\Navigation\NavigationSiteFactory'
            ),
        ); 
    }

    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'render_Slider' => 'Application\View\Helper\Slider',
                'render_Categoria' => 'Application\View\Helper\Categoria',
                'render_Ultimas_Noticas' => 'Application\View\Helper\UltimasNoticias',
            )
        );
    }

}
