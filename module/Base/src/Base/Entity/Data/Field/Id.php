<?php

namespace Base\Entity\Data\Field;

use Doctrine\ORM\Mapping as ORM;

trait Id {

    /**
     * Id da entidade na tabela do banco de dados
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    protected $id;

    /**
     * Getter id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

}
