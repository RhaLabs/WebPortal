<?php

namespace Application\GlobalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OwnerMilestones
 * @ORM\MappedSuperclass
 * @ORM\Table(name="owner_milestones")
 */
class BaseOwnerMilestones
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $id;

    /**
     * Set name
     *
     * @param  string          $name
     * @return OwnerMilestones
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
