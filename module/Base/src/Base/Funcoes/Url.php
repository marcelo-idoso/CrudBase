<?php

/*
 * http://thiagomorello.com/blog/2013/01/como-gerar-urls-amigaveis-perfeitamente-com-php/
 * http://cubiq.org/the-perfect-php-clean-url-generator
 * 
 */

namespace Base\Funcoes;

Trait Url {

    function genereteUrl($str, $replace = array(), $delimiter = '-') {
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return $clean;
    }

}
