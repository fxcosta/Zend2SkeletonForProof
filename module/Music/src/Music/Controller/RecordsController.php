<?php
/**
 * Created by PhpStorm.
 * User: Mateus
 * Date: 12/08/2015
 * Time: 20:04
 */

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Json\Json;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class RecordsController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity="Music\\Entity\\Records";
        $this->form="Music\\Form\\Records";
        $this->service="Music\\Service\\Records";
        $this->controller="records";
        $this->route="album-actions";
    }

    public function jsonAction()
    {
        $array = ['bar' => 'foo', 'mez' => 'tor'];
        return new JsonModel(['data' => $array]);
    }

    /**
     * Segunda forma de exibir as bandas de uma Gravadora
     * Com esse metodo, usamos o nosso atributo bands que é exatamente
     * um ArrayCollection e que armazena todas as bandas da gravadora.
     * Acredito que seja a forma mais correta de se trabalhar com esse tipo de problema
     *
     * @return ViewModel
     */
    public function recordBandsAction()
    {
        $recordId = $this->params()->fromRoute('id', 0);
        $records = $this->getEm()->getReference($this->entity, $recordId);

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($records->getBands()->toArray()));
        $paginator->setCurrentPageNumber($page)
            ->setDefaultItemCountPerPage(10);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }
} 