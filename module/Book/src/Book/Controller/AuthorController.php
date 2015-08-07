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

    public function testAction()
    {
        echo $this->testService->getValor();
    }

    public function listAction()
    {
    }
}

