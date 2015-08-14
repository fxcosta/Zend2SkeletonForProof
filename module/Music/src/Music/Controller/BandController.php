<?php

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

class BandController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity = "Music\\Entity\\Band";
        $this->service = "Music\\Service\\Band";
        $this->form = "Music\\Form\\Band";
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

    /**
     * Primeira forma de se exibir todas as bandas de uma categoria.
     * Com essa forma, pegamos as bandas que tem um recordid igual ao que
     * foi obtido pela rota. Essa forma funciona bem, porém, há uma segunda
     * forma que pode ser encontrada em RecordsController
     *
     * @return ViewModel
     */
    public function recordBandsAction()
    {
        $repository = $this->getEm()->getRepository($this->entity);
        $recordId = $this->params()->fromRoute('id', 0);
        $list = $repository->findBy(['records' => $recordId]);

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
            ->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

}

