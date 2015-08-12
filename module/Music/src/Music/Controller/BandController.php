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
        $this->service = "Music\\Service\\Band";
        $this->form = "Music\\Form\\Band";
        $this->controller = "band";
        $this->route = "album-actions";
    }

}

