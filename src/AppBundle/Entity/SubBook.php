<?php

namespace AppBundle\Entity;

/**
 * SubBook
 */
class SubBook
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
     * @var integer
     */
    private $updatedBy;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Book
     */
    private $book;

    /**
     * @var \AppBundle\Entity\SubBookType
     */
    private $subBookType;


    /**
     * Set item
     *
     * @param string $item
     *
     * @return SubBook
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
     * @return SubBook
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
     * Set updatedBy
     *
     * @param integer $updatedBy
     *
     * @return SubBook
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     *
     * @return SubBook
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return SubBook
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
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return SubBook
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
     * Set subBookType
     *
     * @param \AppBundle\Entity\SubBookType $subBookType
     *
     * @return SubBook
     */
    public function setSubBookType(\AppBundle\Entity\SubBookType $subBookType = null)
    {
        $this->subBookType = $subBookType;

        return $this;
    }

    /**
     * Get subBookType
     *
     * @return \AppBundle\Entity\SubBookType
     */
    public function getSubBookType()
    {
        return $this->subBookType;
    }
}
