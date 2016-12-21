<?php

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

$acl = new Acl();
$acl->addRole(new Role('guest'))
    ->addRole(new Role('admin'));

$acl->addResource(new Resource('someResource'));
$acl->addResource(new Resource('adminarea'));
$acl->addResource(new Resource('adminconferencearea'));
$acl->addResource(new Resource('adminsettingarea'));


$acl->allow('guest', 'someResource');
$acl->allow('admin', 'adminarea');
$acl->allow('admin', 'adminconferencearea');
$acl->allow('admin', 'adminsettingarea');

return [
    'bjyauthorize' => [
        'default_role' => 'guest',
        
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        
        'role_providers' => [
            'BjyAuthorize\Provider\Role\Config' => [
                'guest' => [],
                'admin' => [],
            ]
        ],
        'guards' => [
            'BjyAuthorize\Guard\Controller' => [

            ]
        ]
    ]
];
