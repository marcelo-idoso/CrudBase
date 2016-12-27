<?php

return [
    'navigation' => [
        'navigationMenu' => [
            [
                'label' => "Inicio",
                'icon'  => 'fa fa-dashboard',
                'uri'   => '#',
                'pages' => [
                    [
                        'label' => 'DashBoard',
                        'route' => 'dashboard'
                    ]
                ]
            ],
            [
                'label' => "Cadastros",
                'uri'   => '#',
                'pages' => [
                    [
                        'label' => "Module",
                        'uri'   => '#',
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
                        'label' => 'Controlador',
                        'route' => 'dashboard/controlador',
                    ],
                    [
                        'label' => 'Menu',
                        'route' => 'dashboard/menu',
                    ]
                ]
            ],
            [
                 'label' => "Inicio",
                'uri'   => '#',
            ]
        ]
    ]
];

