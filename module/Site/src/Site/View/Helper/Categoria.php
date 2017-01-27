<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Categoria extends AbstractHelper implements ServiceManagerAwareInterface {

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
     * 
     * @return type
     */
    public function __invoke() {
        $entity = $this->getEntityManager()->getRepository('Application\Entity\Categoria')->findAll();
        $render = $this->renderItem($entity);
        return $render;
    }

    public function renderItem($item) {
        /* @var $itens \Application\Entity\Categoria */
        $html = '';
        $html .= '<div id="widget-menu-list">';
        foreach ($item as $itens) {

            $html .= '<div class="box">';
            $html .= '<i class="'. $itens->getIco() . '" aria-hidden="true"></i>';
            $html .= '<h2>'. $itens->getNome() .'</h2>';
            $html .= '<p>'. $itens->getDescr().'</p>';
            $html .= ' <a href="http://www.sitecontabil.com.br/dicas_marketing/" target="_blank">mais</a>';
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
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
        if (null === $this->em)
            $this->em = $this->getEntityManager()->getRepository('Application\Entity\Categoria');
        return $this->em;
    }

}
