<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Form;

use Base\Form\AbstractForm;

class Empresa extends AbstractForm {

    public function __construct() {
        parent::__construct('Empresa');

        // Nome
        $this->add([
            'name' => 'nome',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium'
            )
        ]);
        
        // Telefone
        $this->add([
            'name' => 'telefone',
            'type' => 'Number',
            'options' => array(
                'label' => 'Telefone'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium'
            )
        ]);
        
        
        // Contato
        $this->add([
            'name' => 'contato',
            'type' => 'Text',
            'options' => array(
                'label' => 'Contato'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium'
            )
        ]);
        
         // Logo
        $this->add([
            'name' => 'logo',
            'type' => 'Text',
            'options' => array(
                'label' => 'Logo'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium'
            )
        ]);
        
        //LogoIco
        $this->add([
            'name' => 'logoico',
            'type' => 'Text',
            'options' => array(
                'label' => 'Icone Logo'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium'
            )
        ]);

        //mimiDescrEmpre
        $this->add([
            'name' => 'mimidescrempre',
            'type' => 'TextArea',
            'options' => array(
                'label' => 'Descrição da empresa'
            ),
            'attributes' => array(
                'class' => 'form-control input-medium',
                'style' => 'height:130px; resize:vertical;'
            )
        ]);

        // googleMaps
        $this->add([
            'name' => 'googlemaps',
            'type' => 'TextArea',
            'options' => array(
                'label' => 'GoogleMaps'
            ),
            'attributes' => array(
                'style' => 'height:60px; resize:vertical;',
                'class' => 'form-control input-medium'
            )
        ]);
    }

}
