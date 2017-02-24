<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Controller;

use Base\Controller\AbstractCrudController;

class Categoria extends AbstractCrudController {

    public function __construct() {
        $this->setColumOrder('orderexibir');
    }

    public function indexAction() {
        $order = $this->getEntityManager()->getRepository($this->getEntityClass())->findBy(['exibir' => 2], [$this->getColumOrder() => $this->defaultOrder]);

        $viewModel = new \Zend\View\Model\ViewModel();
        $viewModel->setVariable('listOrder', $order);

        if ($this->getRequest()->isPost()) {
            try {
                $nn1 = $this->request->getPost('widgetArray');
                $savedEntity = $this->getEntityService()->updateOrdem($nn1, $this->getEntityClass());

                $result = new \Zend\View\Model\JsonModel([
                    'some_parameter' => $nn1,
                    'success' => TRUE,
                    'resultad' => $savedEntity
                ]);
            } catch (\Exception $exc) {
                $result = new \Zend\View\Model\JsonModel([
                    'error' => $savedEntity
                ]);
            }
            return $result;
        }
        return parent::indexAction($viewModel);
    }

}
