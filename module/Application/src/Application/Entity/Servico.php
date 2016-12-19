<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Servico
 *
 * @ORM\Table(name="servico", indexes={@ORM\Index(name="fk_produt_servico", columns={"id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Servico extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \Application\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idServico", referencedColumnName="id" , nullable=false)
     * })
     */
    private $idServico;
    
    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getNome() {
        return $this->nome;
    }
    
      /**
     * Set idmodule
     *
     * @param \Application\Entity\Produto $idServico
     * @return Controller
     */
    public function setIdServico(\Application\Entity\Produto $idServico = null) {
        $this->idServico = $idServico;

        return $this;
    }

    /**
     * Get idmodule
     *
     * @return \Application\Entity\Produto
     */
    public function getIdServico() {
        return $this->idServico;
    }
}
