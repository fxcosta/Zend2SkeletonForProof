<?php

namespace Book\Repository;

use Doctrine\ORM\EntityRepository;

class AuthorRepository extends EntityRepository
{
    public function fetchPairs()
    {
        $entities = $this->findAll();

        $array = array();
        foreach ($entities as $entity) {
            $array[$entity->getId()] = $entity->getDescription();
        }

        return $array;
    }
}