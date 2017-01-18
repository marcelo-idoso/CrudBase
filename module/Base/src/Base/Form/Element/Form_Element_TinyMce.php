<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Form\Element;

use Zend\Form\Element\Textarea;

class Form_Element_TinyMce  extends Textarea{
    /**
     *
     * @var type 
     */
    public $helper = 'formTinyMce';
}
