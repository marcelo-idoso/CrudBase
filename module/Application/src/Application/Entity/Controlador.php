<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Controlador
 *
 * @ORM\Table(name="Controlador", indexes={@ORM\Index(name="fk_module_controlador", columns={"idmodule"})})
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\ControladorRepository")
 * @ORM\HasLifecycleCallbacks
 * 
 */
class Controlador extends AbstractEntity{

    /**
     * @var string
     *
     * @ORM\Column(name="dsControlador", type="string", length=45, nullable=false)
     */
    private $dsControlador;

    /**
     * @var \Application\Entity\Module
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmodule", referencedColumnName="id" , nullable=false)
     * })
     */
    private $idmodule;
    
    
    function getDsControlador() {
        return $this->dsControlador;
    }

    function getIdmodule() {
        return $this->idmodule;
    }

    function setDsControlador($dsControlador) {
        $this->dsControlador = $dsControlador;
        return $this;
    }

    function setIdmodule(\Application\Entity\Module $idmodule) {
        $this->idmodule = $idmodule;
        return $this;
    }



}
