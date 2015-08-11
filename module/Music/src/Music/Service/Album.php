<?php
/**
 * Created by PhpStorm.
 * User: fx3costa
 * Date: 10/08/2015
 * Time: 22:19
 */

namespace Music\Service;

use Doctrine\ORM\EntityManager;
use Fx3costa\Service\AbstractService;

class Album extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = "Music\\Entity\\Album";
    }
}