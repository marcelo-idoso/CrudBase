<?php

namespace Application\Form\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class ControladorFilter implements InputFilterAwareInterface {

    public function getInputFilter() {

        $inputFilter = new InputFilter();

        $inputFilter->add(
                array(
                    'name' => 'dsControlador',
                    'requerid' => TRUE,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'min' => '1',
                                'max' => '50',
                            )
                        )
                    )
                )
        );
        $this->inputFilter = $inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        
    }

}
