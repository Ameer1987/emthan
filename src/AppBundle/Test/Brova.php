<?php

namespace AppBundle\Entity;

/**
 * Brova
 */
class Brova
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var \DateTime
     */
    private $receivedDate;

    /**
     * @var \DateTime
     */
    private $sentDate;

    /**
     * @var \DateTime
     */
    private $expectedDate;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\SubBook
     */
    private $subBook;

    /**
     * @var \AppBundle\Entity\Employee
     */
    private $responsibility;

    public function __toString() {
        return (string) $this->getItem();
    }
    /**
     * Set item
     *
     * @param string $item
     *
     * @return Brova
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
     * Set receivedDate
     *
     * @param \DateTime $receivedDate
     *
     * @return Brova
     */
    public function setReceivedDate($receivedDate)
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }

    /**
     * Get receivedDate
     *
     * @return \DateTime
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * Set sentDate
     *
     * @param \DateTime $sentDate
     *
     * @return Brova
     */
    public function setSentDate($sentDate)
    {
        $this->sentDate = $sentDate;

        return $this;
    }

    /**
     * Get sentDate
     *
     * @return \DateTime
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * Set expectedDate
     *
     * @param \DateTime $expectedDate
     *
     * @return Brova
     */
    public function setExpectedDate($expectedDate)
    {
        $this->expectedDate = $expectedDate;

        return $this;
    }

    /**
     * Get expectedDate
     *
     * @return \DateTime
     */
    public function getExpectedDate()
    {
        return $this->expectedDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Brova
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Brova
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     *
     * @return Brova
     */
    public function setUpdatedBy(\AppBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return Brova
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set subBook
     *
     * @param \AppBundle\Entity\SubBook $subBook
     *
     * @return Brova
     */
    public function setSubBook(\AppBundle\Entity\SubBook $subBook = null)
    {
        $this->subBook = $subBook;

        return $this;
    }

    /**
     * Get subBook
     *
     * @return \AppBundle\Entity\SubBook
     */
    public function getSubBook()
    {
        return $this->subBook;
    }

    /**
     * Set responsibility
     *
     * @param \AppBundle\Entity\Employee $responsibility
     *
     * @return Brova
     */
    public function setResponsibility(\AppBundle\Entity\Employee $responsibility = null)
    {
        $this->responsibility = $responsibility;

        return $this;
    }

    /**
     * Get responsibility
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getResponsibility()
    {
        return $this->responsibility;
    }
}
