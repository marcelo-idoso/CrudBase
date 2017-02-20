<?php

namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;

abstract class AbstractBaseController extends AbstractActionController{
 
    
    protected $defaultOrder     = 'asc' ; // default Ordenação de Registros
            
    protected $defaultPageSize  = 10 ; // limite De registros Por Pagina

    protected $successMessage   = 'Operação Realizada Com Sucesso! ';
    
    protected $errorMessage     = 'Erro Não Foi Possivel concluir a Operação Contate o Administrador!' ;
    
    protected $columOrder       = NULL;
    /**
     * Recupera o nome Do Module
     * 
     * @return String
     */
    protected function getModuleName(){
        $module_array = explode('\\', get_class($this));
        
        return $module_array[0];
    }
    
    /**
     * Recupera o nome Do Controller
     * 
     * @return String
     */
    protected function getControllerName($caixaLetra = null){
        
        $module_array = explode('\\', get_class($this));
        
        if ($caixaLetra === 1){
            $Minuscula = $module_array[2];
            $formato = strtolower($Minuscula);
        }else{
            $formato = $module_array[2];
        }
        return $formato;
    }
    
    protected function getAddForm(){
        return $this->getForm();
    }

    public function getActionRouter($action = null) {
       if (NULL == $action) {
            $action = $this->getEvent()->getRouteMatch()->getParam('action');
        }
        return  $this->getControllerName(1) . '/' . $action;
    }

    function getColumOrder() {
        return $this->columOrder;
    }

    function setColumOrder($columOrder) {
        $this->columOrder = $columOrder;
    }


    
}
