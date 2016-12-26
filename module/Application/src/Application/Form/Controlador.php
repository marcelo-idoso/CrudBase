<?php

namespace Application\Form;

use Base\Form\AbstractForm;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;

class Controlador extends AbstractForm implements ObjectManagerAwareInterface {
    
    protected $objectManager;
     
    public function __construct() {
        parent::__construct('Controlador');

        $nome = array(
            'name' => 'dsControlador',
            'type' => 'Text',
            'options' => array(
                'label' => "Nome: "
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        );
                
        $module = array(
            'name' => 'idmodule',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Module',
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
        $this->add($module);
        
        
        
    }

    public function getObjectManager() {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager) {
        $this->objectManager = $objectManager; 
    }

}
