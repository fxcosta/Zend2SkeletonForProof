<?php
/**
 * Created by PhpStorm.
 * User: Mateus
 * Date: 12/08/2015
 * Time: 20:04
 */

namespace Music\Controller;

use Fx3costa\Controller\AbstractFx3Controller;

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

    public function playAction()
    {

    }
} 