<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Parceiros extends AbstractHelper implements ServiceManagerAwareInterface {

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
        $entity = $this->getEntityManager()->getRepository('Application\Entity\Parceiros')->findAll();
        if ($entity != NULL) {
            $render = $this->renderItem($entity);
            return $render;
        }else{
            return FALSE ;
        }
    }

    public function renderItem($item) {
        /* @var $itens \Application\Entity\Parceiros */
        $html = '';
        $html .= '<div class="col-md-12" id="publicidade-lateral">';
        $html .= '<h1>Parceiros </h1>';
        foreach ($item as $itens) {
            $html .= '<a href="' . $itens->getLink() . '"> ';
            $html .='<img src="' . $itens->getImg() . '" alt="" width="292" height="190"/>';
            $html .='</a>';
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
            $this->em = $this->getEntityManager()->getRepository('Application\Entity\Parceiros');
        return $this->em;
    }

}
