<?php

return [
    'navigation' => [
        'navigationMenu' => [
            [
                'label' => "Inicio",
                'icon' => 'fa fa-dashboard',
                'uri' => '#',
                'resource' => 'controller/Application\Controller\Dashboard',
                'pages' => [
                    [
                        'label' => 'DashBoard',
                        'route' => 'dashboard'
                    ]
                ]
            ],
            [
                'label' => "Delopep",
                'icon' => 'fa fa-laptop',
                'uri' => '#',
                'resource' => 'controller/Application\Controller\Module',
                'pages' => [
                    [
                        'label' => "Module",
                        'uri' => '#',
                        'resource' => 'controller/Application\Controller\Module',
                        'pages' => [
                            [
                                'label' => 'Listar',
                                'route' => 'dashboard/module',
                            ],
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/module/inserir',
                            ],
                            [
                                'label' => 'Excluir',
                                'route' => 'dashboard/module/excluir',
                            ],
                            [
                                'label' => 'Editar',
                                'route' => 'dashboard/module/editar',
                            ]
                        ]
                    ],
                    [
                        'Label' => 'Controlador',
                        'uri' => '#',
                        'pages' => [
                            [
                                'label' => 'Listar',
                                'route' => 'dashboard/controlador',
                            ],
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/controlador/inserir',
                            ],
                            [
                                'label' => 'Excluir',
                                'route' => 'dashboard/controlador/excluir',
                            ],
                            [
                                'label' => 'Editar',
                                'route' => 'dashboard/controlador/editar',
                            ]
                        ]
                    ],
                    [
                        'label' => "Menu",
                        'uri' => '#',
                        'pages' => [
                            [
                                'label' => 'Listar',
                                'route' => 'dashboard/menu',
                            ],
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/menu/inserir',
                            ],
                            [
                                'label' => 'Excluir',
                                'route' => 'dashboard/menu/excluir',
                            ],
                            [
                                'label' => 'Editar',
                                'route' => 'dashboard/menu/editar',
                            ]
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Empresa',
                'uri' => '#',
                'icon' => 'fa fa-building-o',
                'resource' => 'controller/Application\Controller\Empresa',
                'pages' => [
                    [
                        'label' => 'Inserir',
                        'route' => 'dashboard/empresa/inserir',
                    ],
                    [
                        'label' => 'Listar',
                        'route' => 'dashboard/empresa',
                    ],
                    [
                        'label' => 'Editar',
                        'route' => 'dashboard/empresa/editar',
                    ],
                    [
                        'label' => 'Excluir',
                        'route' => 'dashboard/empresa/excluir',
                    ],
                ]
            ],
            [
                'label' => 'Postagem',
                'uri' => '#',
                'icon' => 'fa fa-building-o',
                'resource' => 'controller/Application\Controller\Categoria',
                'pages' => [
                    [
                        'label' => "Categoria",
                        'uri' => '#',
                        'pages' => [
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/categoria/inserir',
                            ],
                            [
                                'label' => 'Listar',
                                'route' => 'dashboard/categoria',
                            ],
                            [
                                'label' => 'Editar',
                                'route' => 'dashboard/categoria/editar',
                            ],
                            [
                                'label' => 'Excluir',
                                'route' => 'dashboard/categoria/excluir',
                            ],
                        ]
                    ],
                    [
                        'label' => "Post",
                        'uri' => '#',
                        'pages' => [
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/postagem/inserir',
                            ],
                            [
                                'label' => 'Listar',
                                'route' => 'dashboard/postagem',
                            ],
                            [
                                'label' => 'Editar',
                                'route' => 'dashboard/postagem/editar',
                            ],
                            [
                                'label' => 'Excluir',
                                'route' => 'dashboard/postagem/excluir',
                            ],
                        ]
                    ],
                    [
                        'label' => "Slider",
                        'uri' => '#',
                        'pages' => [
                            [
                                'label' => 'Inserir',
                                'route' => 'dashboard/slider',
                            ],
                        ]
                    ]
                ]
            ]
        ]
    ]
];

