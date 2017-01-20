<?php

namespace Base\View\Helper;

use Zend\View\Helper\AbstractHelper as ZendAbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class AbstractHelper extends ZendAbstractHelper implements ServiceManagerAwareInterface{

    /**
     *
     * @var \Doctrine\ORM\EntityManager 
     */
    protected $em;
    protected $sm;

    public function __construct($e, $sm) {
        $app = $e->getParam('application');
        $this->sm = $sm;
        $em = $this->getEntityManager();
    }
    
    
        /**
     * @return Doctrine\ORM\EntityManager
     */
    public function getEntityManager() {
        if (null === $this->em) {
            $this->em = $this->sm->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    /**
     * 
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function setEntityManager(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * Retrieve service manager instance
     *
     * @return ServiceManager
     */
    public function getServiceManager() {
        return $this->sm->getServiceLocator();
    }

    /**
     * Set service manager instance
     *
     * @param ServiceManager $locator
     * @return void
     */
    public function setServiceManager(ServiceManager $serviceManager) {
        $this->sm = $serviceManager;
    }

    /**
     * get repository
     * @return type
     */
    public function getRepository() {
        return $this->em;
    }
    

}
