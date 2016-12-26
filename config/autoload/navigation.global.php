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
                                'label' => 'Inserir',
                                'route' => 'module/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'module/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'module/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Controlador',
                        'route' => 'controlador',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'controlador/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'controlador/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'controlador/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Menu',
                        'route' => 'menu',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'menu/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'menu/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'menu/editar',
                            ),
                        ),
                    ),
                ),
            ),
            
        )
    )
);
