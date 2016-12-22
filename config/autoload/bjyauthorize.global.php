<?php

return [
    'bjyauthorize' => [
        
        
        'default_role'       => 'guest',         // not authenticated
        
        
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
                'Editar' => [],
                'Home' => []
            ]
        ],
        'rule_providers' => [
            'BjyAuthorize\Provider\Rule\Config' => [
                'allow' => [
                    ['user', 'Editar', 'create'],
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
                    'roles' => array('user')
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
