<?php

namespace Book\Service;

use Book\Entity\AuthorBook;
use Doctrine\ORM\EntityManager;
use Fx3costa\Service\AbstractService;

class Book extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
        $this->entity = "Book\\Entity\\Books";
    }

    public function insert(array $data)
    {
        $entity = new $this->entity($data);

        $author = $this->em->getReference("Book\\Entity\\Author", $data['author']);

        $this->em->persist($entity);
        $this->em->flush();

        // Persistir esse relacionamento nessa classe seria violação da SRP?
        $bookAuthor = new AuthorBook(['bookid' => $entity, 'authorid' => $author]);
        $this->em->persist($bookAuthor);
        $this->em->flush();

        return $entity;
    }
}