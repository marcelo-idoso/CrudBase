<?php

namespace Application\Filter\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;

class EmpresaFilter extends InputFilter {

    public function __construct() {

        $logoImagem = new FileInput('logo');
        $logoImagem->setRequired(FALSE);
        $logoImagem->getFilterChain()->attach(new RenameUpload([
            'target' => './public_html/imagem/upload/empresa/'. md5(rand(1, 128)),
            'use_upload_extension' => TRUE,
            'randomize' => TRUE
        ]));
        
        $logoImagem->getValidatorChain()->attach(new Size([
            'max' => substr(ini_get('upload_max_filesize'), 0 , -1).'MB'
        ]));
        $logoImagem->getValidatorChain()->attach(new MimeType([
            'image/gif',
            'image/jpeg',
            'image/png',
            'enableHeaderCheck' => TRUE
        ]));
        
        $this->add($logoImagem);
    
        $logoIco = new FileInput('logoico');
        $logoIco->setRequired(FALSE);
        $logoIco->getFilterChain()->attach(new RenameUpload([
            'target' => './public_html/imagem/upload/empresa/',
            'use_upload_extension' => TRUE,
            'randomize' => TRUE
        ]));
        
        $logoIco->getValidatorChain()->attach(new Size([
            'max' => substr(ini_get('upload_max_filesize'), 0 , -1).'MB'
        ]));
        $logoIco->getValidatorChain()->attach(new MimeType([
            'image/x-icon',
            'enableHeaderCheck' => TRUE
        ]));
        
        $this->add($logoIco);
    }

}
