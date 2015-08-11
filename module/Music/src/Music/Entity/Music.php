<?php

namespace Music\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Music
 *
 * @ORM\Table(name="music")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Music\Repository\MusicRepository")
 */
class Music
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods();
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
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=50, nullable=false)
     */
    private $duration;

    /**
     * @ManyToOne(targetEntity="Music\Entity\Album", inversedBy="musics")
     * @JoinColumn(name="albumId", referencedColumnName="id")
     **/
    private $album;

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
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    public function toArray()
    {
        return array('id' => $this->getId(),
            'name' => $this->getName(),
            'duration' => $this->getDuration(),
            'album' => $this->getAlbum()->getId(),
        );
    }

}

