<?php

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MusicController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity = "Music\\Entity\\Music";
        $this->form = "Music\\Form\\Music";
        $this->service = "Music\\Service\\Music";
        $this->controller = "music";
        $this->route = "album-actions";
    }

    public function newAction()
    {
        $form = $this->getServiceLocator()->get('Music\Form\Music');
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
        $form =  $this->getServiceLocator()->get('Music\Form\Music');
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

