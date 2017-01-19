<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Postagem
 *
 * @ORM\Table(name="Slider")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Slider extends AbstractEntity {

    /**
     * @var string
     * 
     * @ORM\Column(name="img" ,type="string" , length=255, nullable=false) 
     */
    private $img;

    /**
     *
     * @var string
     * 
     * @ORM\Column (name="titulo" , type="string" , length=255 , nullable=true)
     */
    private $titulo;

    /**
     *
     * @var string
     * 
     * @ORM\Column (name="descricao" , type="string" , length=255 , nullable=true)
     */
    private $descricao;

    function getImg() {
        return $this->img;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setImg($img) {
        $this->img = $img;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
