<?php

return [
    'router' => [
        'routes' => [
            'dashboard' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/dashboard',
                    'defaults' => [
                        'controller' => 'Dashboard',
                        'action' => 'index',
                        '__NAMESPACE__' => 'Application\Controller',
                        'module' => 'application'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'controlador' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/controlador',
                            'defaults' => array(
                                'controller' => 'Controlador',
                                'action' => 'index',
                                '__NAMESPACE__' => 'Application\Controller',
                                'module' => 'application'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'inserir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/inserir',
                                    'defaults' => array(
                                        'action' => 'inserir',
                                    )
                                )
                            ),
                            'excluir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/excluir[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'excluir',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'editar' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/editar[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editar',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'paginator' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '[/page/:page]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'page' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index',
                                        'page' => 1,
                                    )
                                )
                            ),
                        ),
                    ),
                    'module' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/module',
                            'defaults' => array(
                                'controller' => 'Module',
                                'action' => 'index',
                                '__NAMESPACE__' => 'Application\Controller',
                                'module' => 'application'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'inserir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/inserir',
                                    'defaults' => array(
                                        'action' => 'inserir',
                                    )
                                )
                            ),
                            'excluir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/excluir[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'excluir',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'editar' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/editar[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editar',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'excluir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/excluir[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'excluir',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'editar' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/editar[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editar',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'paginator' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '[/page/:page]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'page' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index',
                                        'page' => 1,
                                    )
                                )
                            ),
                        ),
                    ),
                    'menu' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/menu',
                            'defaults' => array(
                                'controller' => 'Menu',
                                'action' => 'index',
                                '__NAMESPACE__' => 'Application\Controller',
                                'module' => 'application'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'inserir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/inserir',
                                    'defaults' => array(
                                        'action' => 'inserir',
                                    )
                                )
                            ),
                            'excluir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/excluir[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'excluir',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'editar' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/editar[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editar',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'paginator' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '[/page/:page]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'page' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index',
                                        'page' => 1,
                                    )
                                )
                            ),
                        ),
                    ),
                    'empresa' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/empresa',
                            'defaults' => array(
                                'controller' => 'Empresa',
                                'action' => 'index',
                                '__NAMESPACE__' => 'Application\Controller',
                                'module' => 'application'
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'inserir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/inserir',
                                    'defaults' => array(
                                        'action' => 'inserir',
                                    )
                                )
                            ),
                            'excluir' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/excluir[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'excluir',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'editar' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/editar[/:id]',
                                    'constraints' => array(
                                        'id' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'editar',
                                        'id' => 0,
                                    )
                                )
                            ),
                            'paginator' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '[/page/:page]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'page' => '\d+'
                                    ),
                                    'defaults' => array(
                                        'action' => 'index',
                                        'page' => 1,
                                    )
                                )
                            ),
                        ),
                    )
                ]
            ],
        ]
    ]
];
