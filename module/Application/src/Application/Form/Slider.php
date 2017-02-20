<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\ORM\EntityManager;

class Slider extends Form implements InputFilterProviderInterface {

    protected $entityManager;

    public function __construct(EntityManager $entityManager) {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    public function init() {
        $this->add(array(
            'name' => 'continent',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->entityManager,
                'target_class' => 'Application\Entity\Slider',
                'property' => 'order',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'getContinent',
                ),
            ),
        ));
    }

    public function getInputFilterSpecification() {
        return array();
    }

}
