<?php

namespace Fx3costa\Service;

use Book\Entity\Configurator;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Essa classe foi retirada dos projetos públicos do Wesley Willians
 * da Schoof Of Net
 *
 * @package Fx3costa\Service
 */
abstract class AbstractService
{
    /**
     * @var EntityManager
     */
    protected $em;
    protected $entity;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function insert(array $data)
    {
       // var_dump($data);exit;
        $entity = new $this->entity($data);
        
        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }
    
    public function update(array $data)
    {
        $entity = $this->em->getReference($this->entity, $data['id']);

        $hydrator = new ClassMethods();
        $entity = $hydrator->hydrate($data, $entity);

        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
    
    public function delete($id)
    {
        $entity = $this->em->getReference($this->entity, $id);
        if($entity) {
            $this->em->remove($entity);
            $this->em->flush();
            return $id;
        }
    }
    
}
