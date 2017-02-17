<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Site\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Base\Entity\EntityManagerAwareTrait;
use Base\Funcoes\Url;

class CategoriaSite extends AbstractActionController {

    use EntityManagerAwareTrait;
    use Url;
    
    public function categoriaAction() {

        $link = $this->params()->fromRoute('id', 0);

        $id = $this->getEntityManager()->getRepository("Application\Entity\Categoria")->getId(['link' => $link] , ['id']);

        $postagem = $this->getEntityManager()->getRepository("Application\Entity\Postagem")->findBy(['idcategoria' => $id['id']]);
        
        return new ViewModel([
            'data' => $postagem ,
            
        ]);
    }
    
    public function postAction() {
        $link = $this->params()->fromRoute('id', 0);
        
        $postagem = $this->getEntityManager()->getRepository("Application\Entity\Postagem")->findOneBy(['link' => $link]);
        
        
        return new ViewModel([
            'data' => $postagem,
            
        ]);
    }

}
