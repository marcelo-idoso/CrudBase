<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;
use Application\Filter\Form\ParceiroFilter;

class Parceiro extends AbstractForm {

    public function __construct() {
        parent::__construct('Parceiro');
        $this->setInputFilter(new ParceiroFilter());
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
            'name' => 'imgparceiro',
            'type' => 'File',
            'options' => array(
                'label' => 'Imagem'
            ),
            'attributes' => array(
                'class' => 'ImagemFile',
                'id' => 'imagem_file_parceiro'
            )
        ));

        $this->add(array(
            'name' => 'link',
            'type' => 'Text',
            'options' => array(
                'label' => 'Link'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
    }

}
