<?php

namespace Music\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Music\Repository\AlbumRepository")
 */
class Album
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
        $this->year = new \DateTime();
        $this->musics = new ArrayCollection();
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="datetime", length=50, nullable=false)
     */
    private $year;

    /**
     * @OneToMany(targetEntity="Music\Entity\Music", mappedBy="album")
     **/
    private $musics;

    /**
     * @ManyToOne(targetEntity="Music\Entity\Band", inversedBy="albuns")
     * @JoinColumn(name="bandId", referencedColumnName="id")
     **/
    private $band;

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
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param string $year
     */
    public function setYear($year)
    {
        $this->year = new \DateTime($year);
    }

    /**
     * @return mixed
     */
    public function getMusics()
    {
        return $this->musics;
    }

    public function getBand()
    {
        return $this->band;
    }

    public function toArray()
    {
        return array('id' => $this->getId(),
            'name' => $this->getName(),
            'year' => date_format($this->getYear(), 'Y-m-d'),
            'band' => $this->getBand()->getBandName(),
        );
    }

}

