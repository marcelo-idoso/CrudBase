<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'navigation'          => 'Zend\Navigation\Service\DefaultNavigationFactory',
            'navigationMenu'       => 'Base\Navigation\NavigationMenu'
        ),
        'invokables'   => array(
            'los_form_element_errors' => 'LosUi\Form\View\Helper\FormElementErrors',
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        )
    )
);
