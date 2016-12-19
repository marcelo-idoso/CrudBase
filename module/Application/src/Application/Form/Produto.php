<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;
use Application\Form\Filter\ProdutoFilter;


class Produto extends AbstractForm {

    public function __construct() {
         parent::__construct('Produto');
         
         $filter = new ProdutoFilter();
       
        $this->setAttribute('method', 'POST');
        $nome = array(
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        );

        $this->add($nome);        
        $this->setInputFilter($filter->getInputFilter());
    }

}
