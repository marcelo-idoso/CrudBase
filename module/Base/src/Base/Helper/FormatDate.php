<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Base\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class FormatDate extends AbstractHelper{
    
    
    public function __invoke($date) {
        /* $data \Zend\I18n\View\Helper\DateFormat */
        $data =  $date; 
        if ($data instanceof \DateTime){
           $dte =  $data->format('d F Y');
        }
        return ($dte);
    }
}
