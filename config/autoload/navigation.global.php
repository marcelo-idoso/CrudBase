<?php
return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'icon'  => 'fa fa-dashboard',
                'pages' => array(
                    array(
                        'label' => 'Module',
                        'route' => 'module',
                        'pages' => array(
                            array(
                                'label' => 'Module Inserir',
                                'route' => 'module/inserir',
                            ),
                        ),
                    ),
                ),
            ),
            
        )
    )
);
