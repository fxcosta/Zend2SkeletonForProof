<?php
/**
 * Created by PhpStorm.
 * User: fx3costa
 * Date: 14/08/2015
 * Time: 23:26
 */

namespace RestApi\Controller;

use Doctrine\ORM\EntityManager;
use RestApi\Traits\GetEntityManagerService;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class SampleRestfulController extends AbstractRestfulController
{
    use GetEntityManagerService;

    public function __construct()
    {
    }

    public function get($id)
    {
        $repo = $this->getEm()->getRepository("Music\\Entity\\Records");
        $data = $repo->find($id)->toArray();
        return new JsonModel(['data' => $data]);
    }
}