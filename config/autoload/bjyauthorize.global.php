<?php

return [
    'bjyauthorize' => [
        'default_role' => 'guest',
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        'role_providers' => [

            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Application\Entity\Role',
            ],
            'BjyAuthorize\Provider\Role\Config' => [
                'guest' => [],
                'admin' => [],
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
                    [
                        ['admin'], 'Module', ['edit'],
                    ]
                ]
            ]
        ],
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [
                [
                    'controller' => 'zfcuser',
                    'roles' => array('guest',)
                ],
                [
                    'controller' => 'Application\Controller\Module',
                    'roles' => array('admin')
                ]
            ]
        ]
    ]
];
