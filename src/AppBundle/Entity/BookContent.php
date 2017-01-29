<?php

namespace AppBundle\Entity;

/**
 * BookContent
 */
class BookContent
{
    /**
     * @var string
     */
    private $item;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $brovas;

    /**
     * @var \AppBundle\Entity\BookUnit
     */
    private $book_unit;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;
    
        public function __toString() {
        return (string) $this->getItem();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->brovas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set item
     *
     * @param string $item
     *
     * @return BookContent
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BookContent
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
     * @return BookContent
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
     * Add brova
     *
     * @param \AppBundle\Entity\Brova $brova
     *
     * @return BookContent
     */
    public function addBrova(\AppBundle\Entity\Brova $brova)
    {
        $this->brovas[] = $brova;

        return $this;
    }

    /**
     * Remove brova
     *
     * @param \AppBundle\Entity\Brova $brova
     */
    public function removeBrova(\AppBundle\Entity\Brova $brova)
    {
        $this->brovas->removeElement($brova);
    }

    /**
     * Get brovas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBrovas()
    {
        return $this->brovas;
    }

    /**
     * Set bookUnit
     *
     * @param \AppBundle\Entity\BookUnit $bookUnit
     *
     * @return BookContent
     */
    public function setBookUnit(\AppBundle\Entity\BookUnit $bookUnit = null)
    {
        $this->book_unit = $bookUnit;

        return $this;
    }

    /**
     * Get bookUnit
     *
     * @return \AppBundle\Entity\BookUnit
     */
    public function getBookUnit()
    {
        return $this->book_unit;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     *
     * @return BookContent
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
     * @return BookContent
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
}
