<?php

namespace Book\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

class BookController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity = "Book\\Entity\\Books";
        $this->form = "Book\\Form\\Book";
        $this->service = "Book\\Service\\Book";
        $this->controller = "book";
        $this->route = "book-actions";
    }

    public function indexAction()
    {
        $list = $this->getEm()
            ->getRepository($this->entity)
            ->findAll();

/*        foreach($list as $l) {
            $author = $this->em->getReference("Book\\Entity\\AuthorBook", $data['author']);
        }*/

        //var_dump($list[0]->getName());exit;

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page)
            ->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    public function newAction()
    {
        $form = $this->getServiceLocator()->get('Book\Form\Book');
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
        $form = $this->getServiceLocator()->get('Book\Form\Book');
        $request = $this->getRequest();

        $repository = $this->getEm()->getRepository($this->entity);
        $entity = $repository->find($this->params()->fromRoute('id',0));

        if($this->params()->fromRoute('id',0))
            $form->setData($entity->toArray());

        if($request->isPost()) {

            $form->setData($request->getPost());

            if($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                $service->update($request->getPost()->toArray());

                return $this->redirect()->toRoute($this->route,array('controller'=>$this->controller));
            }
        }
        return new ViewModel(array('form'=>$form));
    }

}

