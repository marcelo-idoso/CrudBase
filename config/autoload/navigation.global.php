<?php

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'application',
                'icon' => 'fa fa-dashboard',
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
);
