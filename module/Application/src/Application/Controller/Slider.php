<?php

namespace Application\Controller;

use Base\Controller\AbstractCrudController;

class Slider extends AbstractCrudController {

    public function indexAction() {
        if ($this->getRequest()->isPost()) {


            try {
                $nn1 = $this->request->getPost('widgetArray');

                $savedEntity = $this->getEntityService()->updateOrdem($nn1, $this->getEntityClass());


                $result = new \Zend\View\Model\JsonModel([
                    'some_parameter' => $savedEntity,
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


        return parent::indexAction();
    }

}
