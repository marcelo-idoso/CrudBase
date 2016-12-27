<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'navigation'          => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'navigationMenu'       => 'Base\Navigation\NavigationMenu'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);
