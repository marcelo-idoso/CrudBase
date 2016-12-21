<?php
[
    'crud-base' => [
        'type'    => 'Literal',
        'options' => [
            'route'    => '/module',
            'defaults' => [
                'module'        => 'application',
                '__NAMESPACE__' => 'Application\Controller',
                'controller'    => 'Application',
                'action'        => 'index'
            ],
            'may_terminate' => true,
            'child_routes'  => [
                'inserir' => [
                   'type'     => 'Segment',
                    'options' => [
                        'route'    => '/inserir',
                        'defaults' => [
                            'action' => 'inserir', 
                        ]
                    ]
                ],
                'excluir' => [
                   'type'     => 'Segment',
                    'options' => [
                        'route'       => '/excluir[/:id]',
                        'constraints' => [
                            'id' => '\d+'
                        ],
                        'defaults' => [
                            'action' => 'excluir',
                            'id'     => 0 
                        ]
                    ]
                ],
                'editar' => [
                   'type'     => 'Segment',
                    'options' => [
                        'route'       => '/editar[/:id]',
                        'constraints' => [
                            'id' => '\d+'
                        ],
                        'defaults' => [
                            'action' => 'editar',
                            'id'     => 0 
                        ]
                    ]
                ],
                'paginator' => [
                   'type'     => 'Segment',
                    'options' => [
                        'route'       => '[/page/:page]',
                        'constraints' => [
                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            'page'   => '\d+'
                        ],
                        'defaults' => [
                            'action' => 'index',
                            'page'     => 1 
                        ]
                    ]
                ],
            ]
        ]
    ]
];
