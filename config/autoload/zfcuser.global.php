<?php

/** ZfcUser Configuration */
$settings = array(
    /* User Model Entity Class */
    'user_entity_class' => 'Application\Entity\User',
    /* Start configuration for ZfcUserDoctrineORM  */
    'enable_default_entities' => FALSE,
);

return array(
    'zfcuser'        => $settings,
    'service_manager' => array(
        'aliases' => array(
            'zfcuser_zend_db_adapter' => (isset($settings['zend_db_adapter'])) ? $settings['zend_db_adapter'] : 'Zend\Db\Adapter\Adapter',
        ),
    ),
);

