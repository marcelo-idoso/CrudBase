<?php

namespace Application\Controller;

use Base\Controller\AbstractCrudController;

class Slider extends AbstractCrudController {
    public function __construct() {
        $this->setColumOrder('orderexibir');
    }
    
    public function indexAction($parent = NULL) {
        $order = $this->getEntityManager()->getRepository($this->getEntityClass())->findBy([], [$this->getColumOrder() => $this->defaultOrder]);
        
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
        return parent::indexAction($viewModel) ;
    }

}
