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
                'class' => 'form-control input-lg'
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
            'name' => 'idmodule',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Slider',
                'property' => 'orderexibir',
                'label' => 'Ordem: ',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findall',
                    'params' => array(
                        'criteria' => array(),
                    ),
                ),
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);
         
    }

}
