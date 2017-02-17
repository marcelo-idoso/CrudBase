<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;
use Base\Funcoes\Url;
/**
 * Categoria
 *
 * @ORM\Table(name="Categoria")
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\CategoriaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Categoria extends AbstractEntity {
    
    use Url;
    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=255, nullable=false)
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ico", type="string", length=255, nullable=false)
     */
    private $ico;

    /**
     * @var string
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=false)
     */
    private $descr;
    
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text", length=500, nullable=false)
     */
    private $link;
    
     /**
     * @var integer
     *
     * @ORM\Column(name="exibir", type="integer", length=1, nullable=true , options={"default":2})
     */
    private $exibir = 2 ;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="orderexibir", type="integer", length=1, nullable=true , options={"default":99})
     */
    private $orderexibir = 99 ;
    
    function setExibir($exibir) {
        $this->exibir = $exibir;
    }
    
    function getExibir() {
        return $this->exibir;
    }
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
    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $link = $this->genereteUrl($this->getNome());
        $this->link = $link;
    }

    function getOrderexibir() {
        return $this->orderexibir;
    }

    function setOrderexibir($orderexibir) {
        $this->orderexibir = $orderexibir;
    }



}
