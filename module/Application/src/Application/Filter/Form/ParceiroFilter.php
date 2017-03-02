<?php

namespace Application\Filter\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;

class ParceiroFilter extends InputFilter {

    public function __construct() {
        
        $imagemParceiro = new FileInput('imgparceiro');
        $imagemParceiro->setRequired(FALSE);
        $imagemParceiro->getFilterChain()->attach(new RenameUpload([
            'target' => './public/imagem/upload/parceiro/'. md5(rand(1, 128)),
            'use_upload_extension' => TRUE,
            'randomize' => TRUE
        ]));
        
        $imagemParceiro->getValidatorChain()->attach(new Size([
            'max' => substr(ini_get('upload_max_filesize'), 0 , -1).'MB'
        ]));
        $imagemParceiro->getValidatorChain()->attach(new MimeType([
            'image/gif',
            'image/jpeg',
            'image/png',
            'enableHeaderCheck' => TRUE
        ]));
        
        $this->add($imagemParceiro);
    }
}
