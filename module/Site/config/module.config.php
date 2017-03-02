<?php

return array(
    'router' => array(
        'routes' => array(
            'posts' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/posts[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z0-9_-][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'CategoriaSite',
                        'action' => 'post'
                    )
                )
            ),
            'inicio' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/[page/:page]',
                    'defaults' => array(
                        'controller' => 'IndexSite',
                        'action' => 'index',
                        'module' => 'site',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'zfcuser',
                        'action' => 'login'
                    )
                )
            ),
            'empresa' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/empresa',
                    'defaults' => array(
                        'controller' => 'IndexSite',
                        'action' => 'empresa'
                    )
                )
            ),
            'contato' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/contato',
                    'defaults' => array(
                        'controller' => 'IndexSite',
                        'action' => 'contato'
                    )
                )
            ),
            'servico' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/servico',
                    'defaults' => array(
                        'controller' => 'IndexSite',
                        'action' => 'servico'
                    )
                )
            ),
            'categoria' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/categoria[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        'controller' => 'CategoriaSite',
                        'action' => 'categoria'
                    )
                )
            ),
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/application',
                    'defaults' => array(
                        'controller' => 'Index',
                        'action' => 'index',
                        '__NAMESPACE__' => 'Site\Controller',
                        'module' => 'site'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                        'child_routes' => array(//permite mandar dados pela url 
                            'wildcard' => array(
                                'type' => 'Wildcard'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'IndexSite' => 'Site\Controller\IndexSite',
            'CategoriaSite' => 'Site\Controller\CategoriaSite',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'render_Slider' => 'Site\View\Helper\Slider',
            'render_Categoria' => 'Site\View\Helper\Categoria',
            'render_Parceiros' => 'Site\View\Helper\Parceiros',
            'render_Empresa'   => 'Site\View\Helper\Empresa', 
            'render_Ultimas_Noticas' => 'Site\View\Helper\UltimasNoticias',
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout_site.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/403Permission' => __DIR__ . '/../view/error/403.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

);
