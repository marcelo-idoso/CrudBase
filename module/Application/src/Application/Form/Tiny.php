<?php

namespace Application\Form;

use Base\Form\AbstractForm;

class Tiny extends AbstractForm{
    
    public function __construct() {
        parent::__construct('Teste');

        $this->add(array(
            'name' => 'nome',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Nome:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
       
        
    }
}
