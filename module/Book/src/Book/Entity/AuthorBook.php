<?php

namespace Book\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * AuthorBook
 *
 * @ORM\Table(name="author_book", indexes={@ORM\Index(name="FK__books", columns={"bookId"}), @ORM\Index(name="FK__author", columns={"authorId"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Book\Repository\AuthorBookRepository")
 */
class AuthorBook
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
/*        $this->authorid = new ArrayCollection();
        $this->bookid = new ArrayCollection();*/
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
     * @var \Book\Entity\Author
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authorId", referencedColumnName="id")
     * })
     */
    private $authorid;

    /**
     * @var \Book\Entity\Books
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Books")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookId", referencedColumnName="id")
     * })
     */
    private $bookid;

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
     * @return \Book\
     */
    public function getAuthorid()
    {
        return $this->authorid;
    }

    /**
     * @param \Book\ $authorid
     */
    public function setAuthorid($authorid)
    {
        $this->authorid = $authorid;
    }

    /**
     * @return \Book\
     */
    public function getBookid()
    {
        return $this->bookid;
    }

    /**
     * @param \Book\ $bookid
     */
    public function setBookid($bookid)
    {
        $this->bookid = $bookid;
    }


}

