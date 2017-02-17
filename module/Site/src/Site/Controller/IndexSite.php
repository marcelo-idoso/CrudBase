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

class IndexSite extends AbstractActionController {

    use EntityManagerAwareTrait;

    public function indexAction() {
        


        return new ViewModel([
        ]);
    }

    public function empresaAction() {
        $empresa = $this->getEntityManager()->getRepository("Application\Entity\Empresa")->getEmpresa();
     
        return new ViewModel([
            'data' => $empresa,
        ]);
    }

    public function contatoAction() {
        $empresa = $this->getEntityManager()->getRepository("Application\Entity\Empresa")->getContato();
     
        return new ViewModel([
            'data' => $empresa,
        ]);
    }

    public function servicoAction() {
        $empresa = $this->getEntityManager()->getRepository("Application\Entity\Empresa")->getServico();
     
        return new ViewModel([
            'data' => $empresa,
        ]);
    }

}
