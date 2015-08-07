<?php

namespace Book\Service;

use Doctrine\ORM\EntityManager;
use Fx3costa\Service\AbstractService;

class Author extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = "Book\Entity\Author";
    }
}