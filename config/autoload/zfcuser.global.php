<?php

/** ZfcUser Configuration */

$settings = array(
    //'zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
    'user_entity_class' => 'Application\Entity\User',
    'enable_default_entities' => FALSE,
    'enable_registration' => FALSE,
    'enable_username' => false,
    'auth_adapters' => array( 100 => 'ZfcUser\Authentication\Adapter\Db' ),
    'enable_display_name' => true,
    'auth_identity_fields' => array( 'email' ),
    'login_form_timeout' => 300,
    'user_form_timeout' => 300,
    'use_redirect_parameter_if_present' => true,
    //'user_login_widget_view_template' => 'zfc-user/user/login.phtml',
    'login_redirect_route' => 'dashboard',
    //'password_cost' => 14,
    'enable_user_state' => false,
    'table_name' => 'user',
);

return array(
    'zfcuser'        => $settings,
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_zend_db_adapter' => (isset($settings['zend_db_adapter'])) ? $settings['zend_db_adapter'] : 'Zend\Db\Adapter\Adapter',
        ),
    ),
);

