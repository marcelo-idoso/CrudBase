<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Categoria
 *
 * @ORM\Table(name="Categoria")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Categoria extends AbstractEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=45, nullable=false)
     */
    private $nome;

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

}
