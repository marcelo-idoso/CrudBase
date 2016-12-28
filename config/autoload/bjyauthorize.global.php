<?php

return [
    'bjyauthorize' => [
        
        
        'default_role'       => 'guest',         // not authenticated
        'template' => 'error/403Permission',
        
       //'unauthorized_strategy' => 'BjyAuthorize\View\RedirectionStrategy',
        
        'identity_provider' => \BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider::class,
       
        
        'role_providers' => [
            
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Application\Entity\Role',
            ],
            'BjyAuthorize\Provider\Role\Config' => [
                'guest' => []
            ]
        ],
        'resource_providers' => [
            'BjyAuthorize\Provider\Resource\Config' => [
                'Module' => [],
            ]
        ],
        'rule_providers' => [
            'BjyAuthorize\Provider\Rule\Config' => [
                'allow' => [
                    [['agent'], 'Module', 'editar'],
                    [[], 'Module', 'excluir']
                    
                ]
            ]
        ],
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [
                [
                    'controller' => 'zfcuser',
                    'roles' => array('guest' ,'user')
                ],
                [
                    'controller' => 'Application\Controller\Module',
                    'roles' => array('user' , 'authenticated')
                ],
                [
                    'controller' => 'Application\Controller\Controlador',
                    'roles' => array('user', 'authenticated')
                ],
                [
                    'controller' => 'Application\Controller\Menu',
                    'roles' => array('user', 'authenticated')
                ],
                [
                    'controller' => 'Application\Controller\Dashboard',
                    'roles' => array('user', 'authenticated')
                ]
            ]
        ],
        'zenddevelopertools' => array(
            'profiler' => array(
                'collectors' => array(
                    'bjy_authorize_role_collector' => 'BjyAuthorize\\Collector\\RoleCollector',
                ),
            ),
            'toolbar' => array(
                'entries' => array(
                    'bjy_authorize_role_collector' => 'zend-developer-tools/toolbar/bjy-authorize-role',
                ),
            ),
        ),
    ]
];
