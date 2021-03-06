<?php

namespace Base\Controller\ORM;

use Zend\View\Model\ViewModel;
use Base\Controller\AbstractBaseController;
use Base\Entity\EntityManagerAwareTrait;
use Zend\Stdlib\Hydrator\ClassMethods;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity as DoctrineHydrator;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;

abstract class AbstractCrudORMController extends AbstractBaseController {

    use EntityManagerAwareTrait;

    /**
     * Entity Service
     * 
     * @var mixed 
     */
    private $entityService;

    public function getEntityClass() {
        $module = $this->getModuleName();
        $controller = $this->getControllerName();
        return "$module\Entity\\$controller";
    }

    public function getServiceClass() {
        $module = $this->getModuleName();
        $controller = $this->getControllerName();
        return "$module\Service\\$controller";
    }

    public function getFormClass() {
        $module = $this->getModuleName();
        $controller = $this->getControllerName();
        return "$module\Form\\$controller";
    }

    /**
     * 
     * @return mixed
     * 
     * @throws \RuntimeException
     */
    public function getEntityService() {
        if (null === $this->entityService) {
            $entityServiceClass = $this->getServiceClass();
            if (!class_exists($entityServiceClass)) {
                throw new \RuntimeException("Classe $entityServiceClass inexistente");
            }
            $this->entityService = new $entityServiceClass();
            $this->entityService->setServiceLocator($this->getServiceLocator());
        }
        return $this->entityService;
    }

    public function getForm($entityForm = null) {

        if (null === $entityForm) {
            $entityForm = $this->getFormClass();
            if (!class_exists($entityForm)) {
                throw new \RuntimeException("Classe $entityForm inexistente");
            }
            /* @var $form \Zend\Form\Form */
            $form = new $entityForm();

            $hasEntity = false;

            foreach ($form->getElements() as $element) {
                if (method_exists($element, 'setObjectManager')) {
                    /* @var $element \Zend\Form\Form */
                    $element->setObjectManager($this->getEntityManager());
                    $hasEntity = TRUE;
                } elseif (method_exists($element, 'getProxy')) {
                    $proxy = $element->getProxy();
                    if (method_exists($proxy, 'setObjectManager')) {
                        $proxy->setObjectManager($this->getEntityManager());
                        $hasEntity = true;
                    }
                }
            }

            if ($hasEntity) {
                $hydrator = new DoctrineHydrator($this->getEntityManager(), $entityForm);
                $form->setHydrator($hydrator);
            } else {
                $form->setHydrator(new ClassMethods());
            }

            // Adicionar o Button Cancelar

            $form->add(array(
                'type' => 'Button',
                'name' => 'Cancelar',
                'options' => array(
                    'label' => '<i class="fa fa-arrow-circle-left"></i> Cancelar',
                    'label_options' => array(
                        'disable_html_escape' => true,
                    )
                ),
                'attributes' => array(
                    'class' => 'btn btn-app',
                    'onclick' => 'top.location=\'' . $this->url()
                            ->fromRoute("dashboard/" . $this->getControllerName(1)) . '\'',
                )
                    ), array('priority' => - 100));
        }

        return $form;
    }

    public function getEntity($entity = null) {
        if (null === $entity) {
            $entity = $this->getEntityClass();
            if (!class_exists($entity)) {
                throw new \RuntimeException("Classe $entity inexistente");
            }
            $objEntity = new $entity();
        }

        return $objEntity;
    }

    public function indexAction($parent = null) {

        // Recupera todos os registros no banco de Dados
        if ($this->getColumOrder() == NULL) {
            $list = $this->getEntityManager()->getRepository($this->getEntityClass())->findAll();
        } else {
            $list = $this->getEntityManager()->getRepository($this->getEntityClass())->findBy([], [$this->getColumOrder() => $this->defaultOrder]);
        }
        $viewModel = new ViewModel(array(
            'parent' => $parent,
            'router' => $this->getControllerName(1),
        ));


        $page = $this->params()->fromRoute('page');
        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
                ->setDefaultItemCountPerPage($this->defaultPageSize);

        $viewModel->setVariable('data', $paginator);

        // Verifica Se Exisite Alguma Messagem Para Ser Retornar a View
        if ($this->flashMessenger()->hasSuccessMessages()) {
            $viewModel->setVariable('success', $this->flashMessenger()->getSuccessMessages());
        } elseif ($this->flashMessenger()->hasErrorMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getErrorMessages());
        } elseif ($this->flashMessenger()->hasInfoMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getInfoMessages());
        }

        return $viewModel;
    }

    public function inserirAction() {


        /* @var $form \Zend\Form\Form */
        if (method_exists($this, 'getForm')) {
            $form = $this->getForm();
        }

        $viewModel = new ViewModel(array(
            'form' => $form,
            'router' => $this->getControllerName(1)
        ));
        $classe = $this->getEntity();
        $entity = new $classe();

        $request = $this->getRequest();

        if ($request->isPost()) {

            $form->setData(
                    array_merge_recursive(
                            $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            ));
            $form->bind($entity);
            if ($form->isValid()) {
                $savedEntity = $this->getEntityService()->save($form, $entity);

                if (!is_object($savedEntity)) {
                    $this->flashMessenger()->addErrorMessage($this->errorMessage . "</br>" . $savedEntity);
                } else {
                    $this->flashMessenger()->addSuccessMessage($this->successMessage);
                }

                return $this->redirect()->toRoute("dashboard/" . $this->getActionRouter('inserir'), [], TRUE);
            }
        }

        if ($this->flashMessenger()->hasSuccessMessages()) {
            $viewModel->setVariable('success', $this->flashMessenger()->getSuccessMessages());
        } elseif ($this->flashMessenger()->hasErrorMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getErrorMessages());
        } elseif ($this->flashMessenger()->hasInfoMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getInfoMessages());
        }

        $this->flashMessenger()->clearMessages();
        return $viewModel;
    }

    public function editarAction() {
        /* @var $form \Zend\Form\Form */
        if (method_exists($this, 'getEditeForm')) {
            $form = $this->getEditeForm();
        }
        $viewModel = new ViewModel(array(
            'form' => $form,
            'router' => $this->getControllerName(1)
        ));

        $id = $this->params()->fromRoute('id', 0);

        if ($id > 0) {
            $em = $this->getEntityManager();
            $objRepository = $em->getRepository($this->getEntityClass());
            $entity = $objRepository->find($id);
            $foto = $this->ValidFoto($form, $entity);

            $form->bind($entity);
            $viewModel->setVariable('id', $id);
        } else {
            return $this->redirect()->toRoute("dashboard/" . $this->getControllerName(1), ['controller' => "dashboard/" . $this->getControllerName(1)], FALSE);
        }



        $request = $this->getRequest();

        if ($request->isPost()) {

            // Remove os Elementos para não ser nessesario criar um validação de insert
            // assim sendo possivel utilizar o doctrine HasLifecycleCallbacks
            $form->remove('date_update');
            $form->getInputFilter()->remove('date_update');
            $form->remove('date_create');
            $form->getInputFilter()->remove('date_create');


            $form->setData(
                    array_merge_recursive(
                            $this->getRequest()->getPost()->toArray(), $this->getRequest()->getFiles()->toArray()
            ));

            if ($form->isValid()) {
                $savedEntity = $this->getEntityService()->save($form, $entity, $foto);

                if (!is_object($savedEntity)) {
                    $this->flashMessenger()->addErrorMessage($this->errorMessage . "</br>" . $savedEntity);
                } else {
                    $this->flashMessenger()->addSuccessMessage($this->successMessage);
                }
                return $this->redirect()->toRoute("dashboard/" . $this->getActionRouter(), [], TRUE);
            }
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            $viewModel->setVariable('success', $this->flashMessenger()->getSuccessMessages());
        } elseif ($this->flashMessenger()->hasErrorMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getErrorMessages());
        } elseif ($this->flashMessenger()->hasInfoMessages()) {
            $viewModel->setVariable('error', $this->flashMessenger()->getInfoMessages());
        }
        return $viewModel;
    }

    public function excluirAction() {

        $id = $this->params()->fromRoute('id', 0);

        if ($id > 0) {
            $em = $this->getEntityManager();
            $objRepository = $em->getRepository($this->getEntityClass());
            $entity = $objRepository->find($id);
            $delete = $this->getEntityService()->delete($entity);

            if (is_object($delete)) {
                $this->flashMessenger()->addSuccessMessage($this->successMessage);
            } else {
                $this->flashMessenger()->addErrorMessage($this->errorMessage . "</br>" . $delete);
            }
        }

        return $this->redirect()->toRoute("dashboard/" . $this->getControllerName(1), ['controller' => "dashboard/" . $this->getControllerName(1)], true);
    }

    public function getEditeForm($entityForm = null) {

        if (null === $entityForm) {
            $entityForm = $this->getFormClass();
            if (!class_exists($entityForm)) {
                throw new \RuntimeException("Classe $entityForm inexistente");
            }
            /* @var $form \Zend\Form\Form */
            $form = new $entityForm();
            // Recupera o id
            $id = $this->getEvent()
                    ->getRouteMatch()
                    ->getParam('id', 0);

            $hasEntity = false;

            foreach ($form->getElements() as $element) {
                if (method_exists($element, 'setObjectManager')) {
                    /* @var $element \Zend\Form\Form */
                    $element->setObjectManager($this->getEntityManager());
                    $hasEntity = TRUE;
                } elseif (method_exists($element, 'getProxy')) {
                    $proxy = $element->getProxy();
                    if (method_exists($proxy, 'setObjectManager')) {
                        $proxy->setObjectManager($this->getEntityManager());
                        $hasEntity = true;
                    }
                }
            }

            if ($hasEntity) {
                $hydrator = new DoctrineHydrator($this->getEntityManager(), $entityForm);
                $form->setHydrator($hydrator);
            } else {
                $form->setHydrator(new ClassMethods());
            }
            $form->add([
                'type' => 'Text',
                'name' => 'id',
                'options' => [
                    'label' => "Codigo"
                ],
                'attributes' => [
                    'id' => 'id',
                    'value' => $id,
                    'class' => 'form-control input-lg col-md-3',
                    'disabled' => 'disabled'
                ],
                'filters' => [
                    [
                        'name' => 'Int',
                    ],
                ],
                'filters' => [
                    [
                        'name' => 'Date-Time',
                    ],
                ],
                'validators' => [
                    [
                        'name' => 'Digits',
                    ],
                ],
                    ], ['priority' => 100]);

            $form->add([
                'type' => 'Date-Time',
                'name' => 'date_create',
                'attributes' => [
                    'class' => 'form-control input-lg',
                    'disabled' => 'Disabled'
                ],
                'options' => [
                    'label' => 'Data de Criação',
                    'format' => 'd/m/Y    H:i:s'
                ],
                    ], ['priority' => - 80]);

            $form->add([
                'type' => 'Date-Time',
                'name' => 'date_update',
                'attributes' => [
                    'class' => 'form-control input-lg',
                    'disabled' => 'Disabled'
                ],
                'options' => [
                    'label' => 'Data de Update',
                    'format' => 'd/m/Y    H:i:s '
                ],
                    ], ['priority' => - 80]);


            // Adicionar o Button Novo
            $form->add(array(
                'type' => 'Button',
                'name' => 'Novo',
                'options' => array(
                    'label' => '<i class="fa fa-sticky-note-o"></i> Novo',
                    'label_options' => array(
                        'disable_html_escape' => true,
                    )
                ),
                'attributes' => array(
                    'class' => 'btn btn-app ',
                    'onclick' => 'top.location=\'' . $this->url()->fromRoute("dashboard/" . $this->getControllerName(1) . '/inserir') . '\'',
                )
                    ), array('priority' => - 100));

            // Excluir
            $form->add(array(
                'type' => 'Button',
                'name' => 'Excluir',
                'options' => array(
                    'label' => '<i class="fa fa-remove "></i> Excluir',
                    'label_options' => array(
                        'disable_html_escape' => true,
                    )
                ),
                'attributes' => array(
                    'class' => 'btn btn-app ',
                    'onclick' => 'top.location=\'' . $this->url()->fromRoute("dashboard/" . $this->getControllerName(1) . '/excluir', array(
                        'controller' => 'controller',
                        'action' => 'excluir',
                        'id' => $id)) . '\'',
                )
                    ), array('priority' => - 100));

            // Cancelar
            $form->add(array(
                'type' => 'Button',
                'name' => 'Cancelar',
                'options' => array(
                    'label' => '<i class="fa fa-arrow-circle-left"></i> Cancelar',
                    'label_options' => array(
                        'disable_html_escape' => true,
                    )
                ),
                'attributes' => array(
                    'class' => 'btn btn-app',
                    'onclick' => 'top.location=\'' . $this->url()
                            ->fromRoute("dashboard/" . $this->getControllerName(1)) . '\'',
                )
                    ), array('priority' => - 100));
        }

        return $form;
    }

    public function ValidFoto($form, $entity) {
        $foto = NULL;
        foreach ($form as $element) {
            if ($element instanceof \Zend\Form\Element\File) {
                $methodoGet = 'get' . ucfirst($element->getName());
                 if (method_exists($entity, $methodoGet)) {
                     $foto[$methodoGet] = $entity->$methodoGet();
                 }
            }
        }
        
        return $foto;
    }

}
