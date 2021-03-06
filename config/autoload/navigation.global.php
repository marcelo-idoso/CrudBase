<?php

return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'dashboard',
                'icon' => 'fa fa-dashboard',
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
                        'label' => 'Categoria',
                        'route' => 'dashboard/categoria',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/categoria/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/categoria/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/categoria/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Postagem',
                        'route' => 'dashboard/postagem',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/postagem/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/postagem/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/postagem/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Slider',
                        'route' => 'dashboard/slider',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/slider/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/slider/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/slider/editar',
                            ),
                        ),
                    ),
                    array(
                        'label' => 'Parceiro',
                        'route' => 'dashboard/parceiro',
                        'pages' => array(
                            array(
                                'label' => 'Inserir',
                                'route' => 'dashboard/parceiro/inserir',
                            ),
                            array(
                                'label' => 'Excluir',
                                'route' => 'dashboard/parceiro/excluir',
                            ),
                            array(
                                'label' => 'Editar',
                                'route' => 'dashboard/parceiro/editar',
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
