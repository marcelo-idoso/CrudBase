<?php

namespace Base;



class Module {

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
                    'Base\Provider\Identity\Identity' => 'Base\Provider\Identity\Identity',
                    'Base\Service\Identity\IdentityProviderServiceFactory' => 'Base\Service\Identity\IdentityProviderServiceFactory'
                ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'render_form'     => 'Base\Helper\FormBoostrap',
                'formatDate'      => 'Base\Helper\FormatDate',
                'render_Slide'    => 'Site\Helper\Slider'
            )
        );
    }

}
