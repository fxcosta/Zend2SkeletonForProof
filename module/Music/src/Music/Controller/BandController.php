<?php

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BandController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity = "Music\\Entity\\Band";
        $this->form = "Music\\Form\\Band";
        $this->service = "Music\\Service\\Band";
        $this->controller = "band";
        $this->route = "album-actions";
    }

    public function newAction()
    {
        $form = $this->getServiceLocator()->get('Music\Form\Band');
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
        $form =  $this->getServiceLocator()->get('Music\Form\Band');
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));

        if($this->params()->fromRoute('id', 0))
            $form->setData($entity->toArray());

        if($request->isPost()) {

            $form->setData($request->getPost());

            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        return new ViewModel(array('form'=>$form));
    }
}

