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
 * SLIDER
 *
 * @ORM\Table(name="SLIDER")
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
     * @var string
     * 
     * @ORM\Column(name="imgalt" ,type="text" , length=255, nullable=false) 
     */
    private $imgalt;

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

    function getImg() {
        return $this->img;
    }

    function getImgalt() {
        return $this->imgalt;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getActive() {
        return $this->active;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getLink() {
        return $this->link;
    }

    function getOrderexibir() {
        return $this->orderexibir;
    }

    function setImg($img) {
        $this->img = $img;
        return $this;
    }

    function setImgalt($imgalt) {
        $this->imgalt = $imgalt;
        return $this;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }

    function setActive($active) {
        $this->active = $active;
        return $this;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    function setLink($link) {
        $this->link = $link;
        return $this;
    }

    function setOrderexibir($orderexibir) {
        $this->orderexibir = $orderexibir;
        return $this;
    }


}
