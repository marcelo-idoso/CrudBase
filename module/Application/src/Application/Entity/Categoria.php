<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Categoria
 *
 * @ORM\Table(name="Categoria")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Categoria extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=45, nullable=false)
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ico", type="string", length=45, nullable=false)
     */
    private $ico;

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=45, nullable=false)
     */
    private $descr;
    
    function getIco() {
        return $this->ico;
    }

    function getDescr() {
        return $this->descr;
    }

    function setIco($ico) {
        $this->ico = $ico;
    }

    function setDescr($descr) {
        $this->descr = $descr;
    }

        
    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}
