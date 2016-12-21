<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Module extends AbstractEntity {

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
