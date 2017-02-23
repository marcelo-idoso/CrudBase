<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class UltimasNoticias extends AbstractHelper implements ServiceManagerAwareInterface {

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
        $entity = $this->getEntityManager()->getRepository('Application\Entity\Postagem')->findBy([], ['id' => 'desc'], 6);

        if ($entity != NULL) {
            $render = $this->renderItem($entity);
            return $render;
        }else{
            return FALSE;
        }
    }

    public function renderItem($item) {
        /* @var $itens \Application\Entity\Postagem */
        $html = '';
        $html.= '<div id="ultimas_noticias">';
        $html.= '<h1>Últimas Postagens</h1>';
        $html.= '<ul>';
        foreach ($item as $itens) {
            $html .= '<li>';
            $html .= ' <a href="http://inlocoassessoriaeservicos.cnt.br.dev/posts/' . $itens->getLink() . '">' . $itens->getTitulo() . '</a>';
            $html .= '</li>';
        }
        $html.= '</ul>';
        $html.= '</div>';

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
            $this->em = $this->getEntityManager()->getRepository('Application\Entity\Postagem');
        return $this->em;
    }

}
