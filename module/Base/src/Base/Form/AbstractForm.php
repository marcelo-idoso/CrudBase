<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * <a class="btn btn-app">
                <i class="fa fa-edit"></i> Edit
              </a>
 * and open the template in the editor.
 */

namespace Base\Form;

use Zend\Form\Form;

abstract class AbstractForm extends Form {

    public function __construct() {
        parent::__construct();

        // Salvar
        
        $this->add(array(
            'type' => 'Button',
            'name' => 'Salvar',
            'options' => array(
                'label' => '<i class="fa fa-save"></i> Salvar',
                'class' => 'style="backgroud:red;"',
                'label_options' => array(
                    'disable_html_escape' => true,
                )
                ),
                'attributes' => array(
                    'type'  => 'submit',
                    'class' => 'btn btn-app',
                )
            ), array('priority' => - 100));
        
        
        // Button Clear
        $this->add(array(
            'type' => 'Button',
            'name' => 'Clear',
            'options' => array(
                'label' => '<i class="fa fa-paint-brush"></i> Limpar',
                'label_options' => array(
                    'disable_html_escape' => true,
                )
                ),
                'attributes' => array(
                    'type'  => 'reset',
                    'class' => 'btn btn-app',
                )
            ), array('priority' => - 100));
        
    }

}
