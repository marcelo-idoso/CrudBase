<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Form\Element;

use DoctrineModule\Form\Element\ObjectMultiCheckbox as DoctrineModuleObjectMultiCheckbox;
use Zend\Stdlib\ArrayUtils;

class ObjectMultiCheckbox extends DoctrineModuleObjectMultiCheckbox {

    public function setValue($value) {
        if ($value instanceof \Traversable) {
            $value = ArrayUtils::iteratorToArray($value);

            foreach ($value as $key => $row) {
                $values[] = $row->getId();
            }

            return parent::setValue($values);
        } elseif ($value == null) {
            return parent::setValue(array());
        } elseif (!is_array($value)) {
            return parent::setValue((array) $value);
        }
    }

}
