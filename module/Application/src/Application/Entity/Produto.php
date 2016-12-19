<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Produto
 *
 * @ORM\Table(name="produto")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Produto extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=45, nullable=false)
     */
    private $nome;

    function setNome($nome) {
        $this->nome = $nome;
    }
    
    function getNome() {
        return $this->nome;
    }

}
