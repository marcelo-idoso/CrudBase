<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * MENU
 *
 * @ORM\Table(name="MENU", indexes={@ORM\Index(name="fk_controlador_menu", columns={"idControlador"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * 
 */
class Menu extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="view", type="string", length=45, nullable=false)
     */
    private $view;

    /**
     * @var \Application\Entity\Controlador
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Controlador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idControlador", referencedColumnName="id" , nullable=false)
     * })
     */
    private $idControlador;

    function getView() {
        return $this->view;
    }

    function getIdControlador() {
        return $this->idControlador;
    }

    function setView($view) {
        $this->view = $view;
    }

    function setIdControlador(\Application\Entity\Controlador $idControlador) {
        $this->idControlador = $idControlador;
    }

}
