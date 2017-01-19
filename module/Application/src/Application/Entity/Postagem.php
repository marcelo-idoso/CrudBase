<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Postagem
 *
 * @ORM\Table(name="Postagem", indexes={@ORM\Index(name="fk_categoria_postagem", columns={"idcategoria"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Postagem extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="TITULO", type="string", length=255, nullable=false)
     */
    private $titulo;
    
    /**
     * @var Date
     *
     * @ORM\Column(name="datapub", type="date",  nullable=false)
     */
    private $datapub;
    
    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", length=255, nullable=false)
     */
    private $conteudo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=45, nullable=false)
     */
    private $tags;
    
    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="string", length=255, nullable=false)
     */
    private $imagem;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="integer", length=1, nullable=false)
     */
    private $status;
    
    /**
     * @var \Application\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcategoria", referencedColumnName="id" , nullable=false)
     * })
     */
    private $idcategoria;

    function getTitulo() {
        return $this->titulo;
    }

    function getDatapub() {
        return $this->datapub;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getTags() {
        return $this->tags;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getStatus() {
        return $this->status;
    }

    function getIdcategoria() {
        return $this->idcategoria;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDatapub(\DateTime $datapub) {
        $this->datapub = $datapub;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setIdcategoria(\Application\Entity\Categoria $idcategoria) {
        $this->idcategoria = $idcategoria;
    }


  
}
