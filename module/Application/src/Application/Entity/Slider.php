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
 * @ORM\Entity(repositoryClass="Application\Repository\SliderRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Slider extends AbstractEntity {

    /**
     * @var string
     * 
     * @ORM\Column(name="img" ,type="text" , length=255, nullable=false) 
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
     * @var integer
     * 
     * @ORM\Column (name="active" , type="integer" , nullable=true)
     */
    private $active;

    /**
     *
     * @var string
     * 
     * @ORM\Column (name="descricao" , type="string" , length=255 , nullable=true)
     */
    private $descricao;

    /**
     *
     * @var string
     * 
     * @ORM\Column (name="link" , type="string" , length=1000 , nullable=true)
     */
    private $link;

    /**
     *
     * @var integer
     * 
     * @ORM\Column (name="orderexibir" , type="integer" , length=1 , nullable=true)
     */
    private $orderexibir;

    function getActive() {
        return $this->active;
    }

    function setActive($active) {
        $this->active = $active;
    }

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

    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function getOrderexibir() {
        return $this->orderexibir;
    }

    function setOrderexibir($orderexibir) {
        $this->orderexibir = $orderexibir;
    }

}
