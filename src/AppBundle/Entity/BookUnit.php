<?php

namespace AppBundle\Entity;

/**
 * BookUnit
 */
class BookUnit
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
     * @var \AppBundle\Entity\Book
     */
    private $book;

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
     * @return BookUnit
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
     * @return BookUnit
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
     * @return BookUnit
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
     * @return BookUnit
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
     * Set book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return BookUnit
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
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     *
     * @return BookUnit
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
     * @return BookUnit
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bookContents;


    /**
     * Add bookContent
     *
     * @param \AppBundle\Entity\BookContent $bookContent
     *
     * @return BookUnit
     */
    public function addBookContent(\AppBundle\Entity\BookContent $bookContent)
    {
        $this->bookContents[] = $bookContent;

        return $this;
    }

    /**
     * Remove bookContent
     *
     * @param \AppBundle\Entity\BookContent $bookContent
     */
    public function removeBookContent(\AppBundle\Entity\BookContent $bookContent)
    {
        $this->bookContents->removeElement($bookContent);
    }

    /**
     * Get bookContents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookContents()
    {
        return $this->bookContents;
    }
}
