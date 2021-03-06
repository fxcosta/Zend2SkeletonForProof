<?php

namespace Book\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation\Hydrator;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator as Hy;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Book\Repository\AuthorRepository")
 */
class Author
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods(); // jeito certo de usar os getters e setters automaticos do doctrine
        $hydrator->hydrate($options, $this);
        //Configurator::configure($this, $options);
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
    private $name = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email = '0';

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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function toArray()
    {
        return array('id' => $this->getId(),
                    'name' => $this->getName(),
                    'email' => $this->getEmail()
        );
    }

}

