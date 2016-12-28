<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Empresa extends AbstractEntity {

    
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="contato", type="string", length=255, nullable=true)
     */
    private $contato;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="telefone", type="integer", length=11, nullable=true)
     */
    private $telefone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="logoIco", type="string", length=255, nullable=true)
     */
    private $logoIco;

    /**
     * @var string
     *
     * @ORM\Column(name="mimiDescrEmpre", type="text", length=65535, nullable=true)
     */
    private $mimiDescrEmpre;

    /**
     * @var string
     *
     * @ORM\Column(name="googleMaps", type="text", length=65535, nullable=true)
     */
    private $googleMaps;
    
    
    

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    function getContato() {
        return $this->contato;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getLogo() {
        return $this->logo;
    }

    function getLogoico() {
        return $this->logoIco;
    }

    function getMimidescrempre() {
        return $this->mimiDescrEmpre;
    }

    function getGooglemaps() {
        return $this->googleMaps;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setLogoIco($logoIco) {
        $this->logoIco = $logoIco;
    }

    function setMimiDescrEmpre($mimiDescrEmpre) {
        $this->mimiDescrEmpre = $mimiDescrEmpre;
    }

    function setGoogleMaps($googleMaps) {
        $this->googleMaps = $googleMaps;
    }




}
