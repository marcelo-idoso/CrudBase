<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;

class Categoria extends AbstractForm {

    public function __construct() {
        parent::__construct('Categoria');

        $this->add(array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
        $this->add(array(
            'name' => 'ico',
            'type' => 'Text',
            'options' => array(
                'label' => 'Icone :'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
        $this->add(array(
            'name' => 'descr',
            'type' => 'Text',
            'options' => array(
                'label' => 'Descrição'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
    }

}
