<?php

namespace AppBundle\Entity;

/**
 * EmployeeType
 */
class EmployeeType
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var \AppBundle\Entity\Employee
     */
    private $id;

    public function __toString() {
        return (string) $this->getItem();
    }
    /**
     * Set item
     *
     * @param string $item
     *
     * @return EmployeeType
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set id
     *
     * @param \AppBundle\Entity\Employee $id
     *
     * @return EmployeeType
     */
    public function setId(\AppBundle\Entity\Employee $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getId()
    {
        return $this->id;
    }
}
