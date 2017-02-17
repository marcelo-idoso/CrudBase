<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Helper;

use Zend\Form\View\Helper\FormRow;

class BaseFormRow extends FormRow {

    public function render(\Zend\Form\Element $element) {
        $html = '';
        if (!$element instanceof \Zend\Form\Element\Button) {

            $html = '<div ';
            $attributes = (array) $element->getOption('wrapper-attributes');

            $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
            $html .= $this->createAttributesString($attributes);


            $html .='>';
            $html .= '<label for="' . $element->getName() . '" class="col-sm-2 control-label">'
                    . $element->getLabel()
                    . '</label>';
            if ($element->getOption('append')) {
                $html .= '<div class="col-sm-8">';
            } else {
                $html .= '<div class="col-sm-10">';
            }
            $html.= $this->getView()->formElement($element);
            $html .= '</div>';
            if ($element->getOption('append')) {
                $html.= '<div class="col-sm-2">'
                        . $element->getOption('append')
                        . '</div>';
            }
            $html .= '</div>';
            $html = '<div ';
            $attributes = (array) $element->getOption('wrapper-attributes');

            $attributes['class'] = (isset($attributes['class']) ? $attributes['class'] : '') . ' form-group';
            $html .= $this->createAttributesString($attributes);


            $html .='>';
            $html .= '<label for="' . $element->getName() . '" class="control-label">'
                    . $element->getLabel()
                    . '</label>';
            $html.= $this->getView()->formElement($element);
            if ($element->getMessages()) {
                foreach ($element->getMessages() as $messagem) {
                    $html .= '<span class="help-block">' . $messagem . '</span>';
                }
            }
            $html .= '</div>';
            return $html;
        }
    }

}
