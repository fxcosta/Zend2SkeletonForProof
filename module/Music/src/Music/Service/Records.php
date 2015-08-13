<?php
/**
 * Created by PhpStorm.
 * User: Mateus
 * Date: 12/08/2015
 * Time: 20:40
 */

namespace Music\Service;


use Doctrine\ORM\EntityManager;
use Fx3costa\Service\AbstractService;

class Records extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity="Music\\Entity\\Records";
    }

} 