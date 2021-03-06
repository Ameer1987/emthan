<?php

namespace AppBundle\Entity;

/**
 * Employee
 */
class Employee
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $employeeTypeId;

    /**
     * @var integer
     */
    private $id;
    
    public function __toString() {
        return (string) $this->getName();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Employee
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
     * Set employeeTypeId
     *
     * @param integer $employeeTypeId
     *
     * @return Employee
     */
    public function setEmployeeTypeId($employeeTypeId)
    {
        $this->employeeTypeId = $employeeTypeId;

        return $this;
    }

    /**
     * Get employeeTypeId
     *
     * @return integer
     */
    public function getEmployeeTypeId()
    {
        return $this->employeeTypeId;
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
    /**
     * @var \AppBundle\Entity\EmployeeType
     */
    private $EmployeeType;


    /**
     * Set employeeType
     *
     * @param \AppBundle\Entity\EmployeeType $employeeType
     *
     * @return Employee
     */
    public function setEmployeeType(\AppBundle\Entity\EmployeeType $employeeType = null)
    {
        $this->EmployeeType = $employeeType;

        return $this;
    }

    /**
     * Get employeeType
     *
     * @return \AppBundle\Entity\EmployeeType
     */
    public function getEmployeeType()
    {
        return $this->EmployeeType;
    }
}
