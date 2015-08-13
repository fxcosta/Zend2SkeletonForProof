<?php
/**
 * Created by PhpStorm.
 * User: Mateus
 * Date: 12/08/2015
 * Time: 20:10
 */

namespace Music\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Records
 *
 * @ORM\Table(name="records")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Music\Repository\RecordsRepository")
 */
class Records
{
    public function __construct($options = null)
    {
        $hydrator = new ClassMethods();
        $hydrator->hydrate($options, $this);
        $this->bands = new ArrayCollection();
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
     * @OneToMany(targetEntity="Music\Entity\Band", mappedBy="records")
     **/
    private $bands;

    /**
     * @return mixed
     */
    public function getBands()
    {
        return $this->bands;
    }

    /**
     * @param mixed $bands
     */
    public function setBands($bands)
    {
        $this->bands = $bands;
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

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            //'band'=>$this->getBands()->getBandName(),
        );
    }
} 