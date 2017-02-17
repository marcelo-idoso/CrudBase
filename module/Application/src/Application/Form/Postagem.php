<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;

class Postagem extends AbstractForm {

    public function __construct() {
        parent::__construct('Postagem');

        $this->add(array(
            'name' => 'titulo',
            'type' => 'Text',
            'options' => array(
                'label' => 'Titulo:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));

        $this->add(array(
            'name' => 'idcategoria',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'object_manager' => $this->getObjectManager(),
                'target_class' => 'Application\Entity\Categoria',
                'property' => 'nome',
                'label' => 'Categoria: ',
                'empty_option' => '--- Selecionar Categoria ---',
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
        ));
        $this->add([
            'name' => 'status',
            'type' => 'Select',
            'options' => array(
                'label' => 'Status',
                'value_options' => array(
                    '1' => 'Publicar',
                    '2' => 'Rasculho',
                ),
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            ),
        ]);
        $this->add([
            'name' => 'imagem',
            'type' => 'Text',
            'options' => array(
                'label' => 'imagem'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
            )
        ]);
        $this->add([
            'name' => 'datapub',
            'type' => 'Date',
            'attributes' => array(
                'class' => 'form-control input-lg',
            ),
            'options' => array(
                'label' => 'Data de Publicação'
            )
        ]);
        $this->add([
            'name' => 'tags',
            'type' => 'Text',
            'options' => array(
                'label' => 'Tags de Pesquisa'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
            )
        ]);
        
         $this->add([
            'name' => 'resumo',
            'type' => 'Textarea',
            'options' => array(
                'label' => 'Resumo da Postagem'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg',
                'style' => 'height:130px; resize:vertical;'
            )
        ]);
        
        $this->add([
            'name' => 'conteudo',
            'type' => 'Textarea',
            'attributes' => array(
                'class' => 'form-control input-medium',
                'style' => 'height:330px; resize:vertical;'
            )
        ]);
        
        $this->add(array(
            'name' => 'link',
            'type' => 'Hidden',
        ));
    }

}
