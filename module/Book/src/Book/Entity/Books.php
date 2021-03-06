<?php

namespace Book\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Book\Repository\BookRepository")
 */
class Books
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods(); // jeito certo de usar os getters e setters automaticos do doctrine
        $hydrator->hydrate($options, $this);
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="ISBN", type="string", length=255, nullable=false)
     */
    private $isbn;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function toArray()
    {
        return array('id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'isbn' => $this->getIsbn()
        );
    }
}

