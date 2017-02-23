<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * EMPRESA
 *
 * @ORM\Table(name="EMPRESA")
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\EmpresaRepository")
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
     * @ORM\Column(name="mimiDescrEmpre", type="text", length=800, nullable=true)
     */
    private $mimiDescrEmpre;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=100, nullable=true)
     */
    private $endereco;
    
    /**
     * @var string
     *
     * @ORM\Column(name="horario", type="string", length=100, nullable=true)
     */
    private $horario;


    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="integer", length=9, nullable=true)
     */
    private $cep;
    
    /**
     * @var string
     *
     * @ORM\Column(name="googleMaps", type="text", length=65535, nullable=true)
     */
    private $googleMaps;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pempresa", type="text", length=65535, nullable=true)
     */
    private $pempresa;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pcontatos", type="text", length=65535, nullable=true)
     */
    private $pcontatos;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pservicos", type="text", length=65535, nullable=true)
     */
    private $pservicos;
    

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

    function getPempresa() {
        return $this->pempresa;
    }

    function getPcontatos() {
        return $this->pcontatos;
    }

    function getPservicos() {
        return $this->pservicos;
    }

    function setPempresa($pempresa) {
        $this->pempresa = $pempresa;
    }

    function setPcontatos($pcontatos) {
        $this->pcontatos = $pcontatos;
    }

    function setPservicos($pservicos) {
        $this->pservicos = $pservicos;
    }


    function getEndereco() {
        return $this->endereco;
    }

    function getHorario() {
        return $this->horario;
    }

    function getCep() {
        return $this->cep;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }



}
