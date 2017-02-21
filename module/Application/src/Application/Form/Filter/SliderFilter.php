<?php

namespace Application\Form\Filter;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;

class SliderFilter extends InputFilter {

    public function __construct() {
        $arquivo = new FileInput('img');
        $arquivo->setRequired(FALSE);
        $arquivo->getFilterChain()->attach(new RenameUpload([
            'target' => './data',
            'use_upload_extension' => TRUE,
            'randomize' => TRUE
        ]));

        $arquivo->getValidatorChain()->attach(new Size([
            'max' => substr(ini_get('upload_max_filesize') , 0 , -1).'MB'
        ]));
        
        $arquivo->getValidatorChain()->attach(new MimeType([
            'image/gif',
            'image/jpeg',
            'image/png',
            'enableHeaderCheck' => TRUE
        ]));
        
        $this->add($arquivo);
    }

}
