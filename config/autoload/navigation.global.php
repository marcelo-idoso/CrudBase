<?php
return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'dashboard',
                'icon'  => 'fa fa-dashboard',
                'pages' => array(
           
                    array(
                        'label' => 'Module',
                        'route' => 'dashboard/module',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/module/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/module/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/module/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Controlador',
                        'route' => 'dashboard/controlador',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/controlador/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/controlador/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/controlador/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Menu',
                        'route' => 'dashboard/menu',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/menu/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/menu/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/menu/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Profile',
                        'route' => 'zfcuser',
                    )
                ),
            ),
            
        )
    )
);
