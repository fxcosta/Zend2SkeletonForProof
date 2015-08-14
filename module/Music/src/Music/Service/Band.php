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
use Zend\Stdlib\Hydrator\ClassMethods;

class Band extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = "Music\\Entity\\Band";
    }

    public function insert(array $data)
    {
        $entity = new $this->entity($data);

        $records = $this->em->getReference("Music\\Entity\\Records", $data['records']);
        $entity->setRecords($records);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);

        $hydrator = new ClassMethods();
        $entity = $hydrator->hydrate($data, $entity);

        $records = $this->em->getReference("Music\\Entity\\Records", $data['records']);
        $entity->setRecords($records);

        $records->bands->add($entity);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}