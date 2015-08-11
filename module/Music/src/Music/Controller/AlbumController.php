<?php

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractFx3Controller
{
    public function __construct()
    {
        $this->entity = "Music\\Entity\\Album";
        $this->form = "Music\\Form\\Album";
        $this->service = "Music\\Service\\Album";
        $this->controller = "album";
        $this->route = "album-actions";
    }

    public function playAction()
    {
    }
}

