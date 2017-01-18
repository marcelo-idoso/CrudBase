<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Helper;

use Zend\Form\View\Helper\FormTextarea;

class FormTinyMce extends FormTextarea {

    protected $_tinyMce;

    public function FormTinyMce($name, $value = null, $attribs = null) {

        $info = $this->_getInfo($name, $value, $attribs);
        extract($info);

        $disabled = '';
        if ($disabled) {
            $disabled = 'disabled = "disabled"';
        }
        if (empty($attribs['rows'])) {
            $attribs['rows'] = (int) $this->rows;
        }
        if (empty($attribs['cols'])) {
            $attribs['cols'] = (int) $this->cols;
        }
        
        if (isset($attribs['editorOptions'])){
            if($attribs['editorOptions'] instanceof \Zend\Config\Config){
                $attribs['editorOtions'] = $attribs['editorOptions']->toArray();
            }
            $this->view->tinyMce()->setOptions($attribs['editorOptions']);
            unset($attribs['editorOptions']);
        }
        $this->view->tinyMce()->reder();
        
        $xhtml = '<textarea name = "' . $this->view->escape($name) . '"'
                . 'id = "' . $this->view->escape($id).'"'
                . $disabled
                . $this->_htmlAttibs($attribs) . '>'
                . $this->view->escape($value) . '</textarea>' ;
        
        return $xhtml;
    }

}
