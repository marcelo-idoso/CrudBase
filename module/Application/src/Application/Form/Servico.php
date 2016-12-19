<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;

class Servico extends AbstractForm implements ObjectManagerAwareInterface{
    
    protected $objectManager;
    
    public function __construct() {
         parent::__construct('Servico Form');
              
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
        
        $descri = array(
            'name' => 'idServico',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Produto',
                'property' => 'nome',
                'label' => 'Modelo: ',
                'empty_option' => '--- Selecionar Module ---',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('nome' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        );
        
        $this->add($nome);
        $this->add($descri);
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager; 
    }

}
