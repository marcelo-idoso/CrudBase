<?php

namespace Site\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;
use Zend\ServiceManager\ServiceManager;

class Slider extends AbstractHelper implements ServiceManagerAwareInterface {

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
        $entity = $this->getEntityManager()->getRepository('Application\Entity\Slider')->findBy([], ['orderexibir' => 'ASC' , 'active' => 1 ]);
        $render = $this->renderSlider($entity);
        return $render;
    }

    public function renderItem($item) {
        /* @var $itens \Application\Entity\Slider */
        $html = '';
        foreach ($item as $itens) {

            if ($itens->getOrderexibir() == 1) {
                $html .= '<div class="item active" >';
            } else {
                $html .= '<div class="item" >';
            }
            if ($itens->getLink()){
                $html .= '<a href="'. $itens->getLink() .'">';
            }
            
            $html .= '<img src="' . $itens->getImg() . '" alt="' . $itens->getId() . '">';
                if ($itens->getTitulo() or $itens->getDescricao()) {
                    $html .= '<div class="carousel-caption">';
                    if ($itens->getTitulo()) {
                        $html .= '<h3>';
                        $html .= $itens->getTitulo();
                        $html .= '</h3>';
                    }
                    if ($itens->getDescricao()) {
                        $html .= '<p>';
                        $html .= $itens->getDescricao();
                        $html .= '</p>';
                    }
                    $html .= '</div>';
                }
            if ($itens->getLink()){
                $html .= '</a>';
            }
            $html .= '</div>';
        }
        return $html;
    }

    public function renderSlider($entity) {
        $html = '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
        $html .= '<ol class="carousel-indicators">';
        $count = 0;
        foreach ($entity as $itens) {
            if ($itens->getActive() == 1) {
                $html .= '<li data-target="#carousel-example-generic" data-slide-to="' . $count . '" class="active"></li>';
            } else {
                $html .= '<li data-target="#carousel-example-generic" data-slide-to="' . $count . '"></li>';
            }
            $count++;
        }
        $html .= '</ol>';
        $html .= '<div class="carousel-inner">';
        $html .= $this->renderItem($entity);
        $html .= '</div>';
        $html .= '<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">';
        $html .= '   <span class="glyphicon glyphicon-chevron-left"></span>';
        $html .= '</a>';
        $html .= '<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">';
        $html .= '   <span class="glyphicon glyphicon-chevron-right"></span>';
        $html .= '</a>';
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
            $this->em = $this->getEntityManager()->getRepository('Application\Entity\Slider');
        return $this->em;
    }

}
