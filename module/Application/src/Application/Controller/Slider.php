<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\FormInterface;
use Zend\View\Model\ViewModel;

class Slider extends AbstractActionController {

    protected $countriesForm;

    public function __construct(FormInterface $countriesForm) {
        $this->countriesForm = $countriesForm;
    }
   
    public function inserir() {
        return new ViewModel(array(
            'form' => $this->countriesForm ,
        ));
    }
    
    
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
