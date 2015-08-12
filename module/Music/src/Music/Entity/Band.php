<?php

namespace Music\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Band
 *
 * @ORM\Table(name="band")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Music\Repository\BandRepository")
 */
class Band
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
        $this->albuns = new ArrayCollection();
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
     * @OneToMany(targetEntity="Music\Entity\Album", mappedBy="band")
     **/
    private $albuns;

    /**
     * @return mixed
     */
    public function getAlbuns()
    {
        return $this->albuns;
    }

    /**
     * @param mixed $albuns
     */
    public function setAlbuns($albuns)
    {
        $this->albuns = $albuns;
    }

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
     * @return mixed
     */

    public function toArray()
    {
        return array('id' => $this->getId(),
            'name' => $this->getName(),
            'album' => $this->getAlbuns()->getId(),
        );
    }

}

