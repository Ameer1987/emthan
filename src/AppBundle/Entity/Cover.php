<?php

namespace AppBundle\Entity;

/**
 * Cover
 */
class Cover
{
    /**
     * @var string
     */
    private $colors;

    /**
     * @var boolean
     */
    private $solofanMatly;

    /**
     * @var boolean
     */
    private $solofanLamea;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Employee
     */
    private $responsibility;

    /**
     * @var \AppBundle\Entity\Book
     */
    private $book;

    
    public function __toString() {
        return (string) $this->getItem();
    }
    
    /**
     * Set colors
     *
     * @param string $colors
     *
     * @return Cover
     */
    public function setColors($colors)
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Get colors
     *
     * @return string
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Set solofanMatly
     *
     * @param boolean $solofanMatly
     *
     * @return Cover
     */
    public function setSolofanMatly($solofanMatly)
    {
        $this->solofanMatly = $solofanMatly;

        return $this;
    }

    /**
     * Get solofanMatly
     *
     * @return boolean
     */
    public function getSolofanMatly()
    {
        return $this->solofanMatly;
    }

    /**
     * Set solofanLamea
     *
     * @param boolean $solofanLamea
     *
     * @return Cover
     */
    public function setSolofanLamea($solofanLamea)
    {
        $this->solofanLamea = $solofanLamea;

        return $this;
    }

    /**
     * Get solofanLamea
     *
     * @return boolean
     */
    public function getSolofanLamea()
    {
        return $this->solofanLamea;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Cover
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
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
     * Set responsibility
     *
     * @param \AppBundle\Entity\Employee $responsibility
     *
     * @return Cover
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

    /**
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Cover
     */
    public function setBook(\AppBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \AppBundle\Entity\Book
     */
    public function getBook()
    {
        return $this->book;
    }
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \AppBundle\Entity\FosUser
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\FosUser
     */
    private $updatedBy;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Cover
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
     * @return Cover
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
     * Set createdBy
     *
     * @param \AppBundle\Entity\FosUser $createdBy
     *
     * @return Cover
     */
    public function setCreatedBy(\AppBundle\Entity\FosUser $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\FosUser $updatedBy
     *
     * @return Cover
     */
    public function setUpdatedBy(\AppBundle\Entity\FosUser $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
