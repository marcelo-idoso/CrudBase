<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Entity;


use Zend\Stdlib\Hydrator\ClassMethods;
use Base\Entity\Data\Field\Id;
use Base\Entity\Data\Field\Create;
use Base\Entity\Data\Field\Update;

abstract class AbstractEntity {

    use Id;
    use Create;
    use Update;

    
    public function __construct(Array $options = array()) {
         $hydrator = new ClassMethods();
         $hydrator->hydrate($options, $this);
    }
    
    public function toArray() {
        $hydrator = new ClassMethods();
        return $hydrator->extract($this);
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }
    public function exchangeArray() {
        return get_object_vars($this);
    }
}
