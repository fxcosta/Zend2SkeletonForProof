<?php

namespace Book\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCategory
 *
 * @ORM\Table(name="book_category", indexes={@ORM\Index(name="FK__booksvv", columns={"bookId"}), @ORM\Index(name="FK__categoryssss", columns={"categoryId"})})
 * @ORM\Entity
 */
class BookCategory
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
     * @var \Book\\Entity\Books
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Books")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bookId", referencedColumnName="id")
     * })
     */
    private $bookid;

    /**
     * @var \Book\\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="Book\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     * })
     */
    private $categoryid;


}

