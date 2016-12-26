<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;

class Menu extends AbstractForm {

    public function __construct() {
        parent::__construct('Menu_Form');

        $view = array(
            'name' => 'view',
            'type' => 'Text',
            'options' => array(
                'label' => "View: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        );

        $controlador = array(
            'name' => 'idControlador',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Controlador',
                'property' => 'dsControlador',
                'label' => 'Modelo: ',
                'empty_option' => '--- Selecionar Module ---',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('dsControlador' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        );

        $this->add(array(
            'type' => 'Base\Form\Element\MultiCheckbox',
            'name' => 'teste2',
            'options' => array(
                'label' => 'Select countries',
                'label_attributes' => array(
                    'class' => 'checkbox'
                ),
                'value_options' => array(
                    'continent' => 'Europe',
                    [
                        'value' =>  2,
                        'label' => 'United Kingdom',
                        'continent' => 'Europe'
                    ]
                )
            )
        ));
        $teste = array(
            'name' => 'teste',
            'type' => 'Base\Form\Element\ObjectMultiCheckbox',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Controlador',
                'property'       => 'dsControlador',
                'is_method'      => true,
                'find_method'    => array(
                'name'   => 'findBy',
                'params' => array(
                    'criteria' => array('idmodule' => 28),
                    'orderBy'  => array('idmodule' => 'ASC'),
                ),
            ),
            ),
        );

        $this->add($view);
        $this->add($controlador);
        $this->add($teste);
    }

}
