<?php

namespace Book\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthorBook
 *
 * @ORM\Table(name="author_book", indexes={@ORM\Index(name="FK__books", columns={"bookId"}), @ORM\Index(name="FK__author", columns={"authorId"})})
 * @ORM\Entity
 */
class AuthorBook
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Book\\Entity\Author
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authorId", referencedColumnName="id")
     * })
     */
    private $authorid;

    /**
     * @var \Book\\Entity\Books
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Books")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookId", referencedColumnName="id")
     * })
     */
    private $bookid;


}

