<?php

namespace Book\Controller;

use Book\Service\TestService;
use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthorController extends AbstractFx3Controller
{
    /**
     * Instancia de um Service apenas para testes de DI
     *
     * @var TestService
     */
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->entity = "Book\\Entity\\Author";
        $this->form = "Book\\Form\\Author";
        $this->service = "Book\\Service\\Author";
        $this->controller = "authors";
        $this->route = "book-actions";

        $this->testService = $testService;
    }

    /**
     * Override para setar corretamente o formulário pois o mesmo está setado como service
     *
     * @return \Zend\Http\Response|ViewModel
     */
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('Book\Form\Author');
        $request = $this->getRequest();

        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->insert($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action'=>'index'));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function editAction()
    {
        $form = $this->getServiceLocator()->get('Book\Form\Author');
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id', 0));

        if($this->params()->fromRoute('id', 0)) {
            $form->setData($entity->toArray());
        }

        if($request->isPost()) {

            $form->setData($request->getPost());

            if($form->isValid()) {

                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller, 'action' => 'index'));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    public function testAction()
    {
        echo $this->testService->getValor();
    }

    public function listAction()
    {
    }
}

