<?php

namespace Application\Form;

use Base\Form\AbstractForm;
use Application\Form\Filter\SliderFilter;

class Slider extends AbstractForm {


    public function __construct() {
        parent::__construct('Slider');

        $this->setInputFilter(new SliderFilter());

        $this->add([
            'name' => 'titulo',
            'type' => 'Text',
            'options' => array(
                'label' => "Titulo: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);
        
        $this->add([
            'name' => 'alt',
            'type' => 'Text',
            'options' => array(
                'label' => "Imagem Alt: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);

        $this->add([
            'name' => 'descricao',
            'type' => 'Text',
            'options' => array(
                'label' => "Descrição: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);


        $this->add([
            'name' => 'link',
            'type' => 'Text',
            'options' => array(
                'label' => "Link: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);


        $this->add([
            'name' => 'img',
            'type' => 'File',
            'options' => array(
                'label' => "Imagem: "
            ),
            'attributes' => array(
                'id'    => 'imagem_file',
            ),
        ]);


        $this->add([
            'name' => 'active',
            'type' => 'Checkbox',
            'options' => array(
                'label' => "Ativo: "
            ),
        ]);
        
        $this->add([
            'name' => 'orderexibir',
            'type' => 'text',
            'options' => array(
                'label' => "Ordem"
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);
         
    }

}
