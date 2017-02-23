<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * PARCEIROS
 *
 * @ORM\Table(name="PARCEIROS")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Parceiros extends AbstractEntity {
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="link", type="text",  nullable=false)
     */
    private $link;
    
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="text", nullable=false)
     */
    private $img;
    
    function getNome() {
        return $this->nome;
    }

    function getLink() {
        return $this->link;
    }

    function getImg() {
        return $this->img;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setImg($img) {
        $this->img = $img;
    }


}
