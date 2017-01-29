<?php

namespace AppBundle\Entity;

/**
 * Book
 */
class Book {

    /**
     * @var string
     */
    private $item;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $color;

    /**
     * @var integer
     */
    private $pages;

    /**
     * @var \DateTime
     */
    private $sentToPrintDate;

    /**
     * @var \DateTime
     */
    private $finishPrintDate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Employee
     */
    private $responsibility;

    /**
     * @var \AppBundle\Entity\Subject
     */
    private $subject;

    public function __toString() {
        return (string) $this->getItem();
    }

    /**
     * Set item
     *
     * @param string $item
     *
     * @return Book
     */
    public function setItem($item) {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem() {
        return $this->item;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Book
     */
    public function setPrice($price) {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Book
     */
    public function setColor($color) {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor() {
        return $this->color;
    }

    /**
     * Set pages
     *
     * @param integer $pages
     *
     * @return Book
     */
    public function setPages($pages) {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return integer
     */
    public function getPages() {
        return $this->pages;
    }

    /**
     * Set sentToPrintDate
     *
     * @param \DateTime $sentToPrintDate
     *
     * @return Book
     */
    public function setSentToPrintDate($sentToPrintDate) {
        $this->sentToPrintDate = $sentToPrintDate;

        return $this;
    }

    /**
     * Get sentToPrintDate
     *
     * @return \DateTime
     */
    public function getSentToPrintDate() {
        return $this->sentToPrintDate;
    }

    /**
     * Set finishPrintDate
     *
     * @param \DateTime $finishPrintDate
     *
     * @return Book
     */
    public function setFinishPrintDate($finishPrintDate) {
        $this->finishPrintDate = $finishPrintDate;

        return $this;
    }

    /**
     * Get finishPrintDate
     *
     * @return \DateTime
     */
    public function getFinishPrintDate() {
        return $this->finishPrintDate;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set responsibility
     *
     * @param \AppBundle\Entity\Employee $responsibility
     *
     * @return Book
     */
    public function setResponsibility(\AppBundle\Entity\Employee $responsibility = null) {
        $this->responsibility = $responsibility;

        return $this;
    }

    /**
     * Get responsibility
     *
     * @return \AppBundle\Entity\Employee
     */
    public function getResponsibility() {
        return $this->responsibility;
    }

    /**
     * Set subject
     *
     * @param \AppBundle\Entity\Subject $subject
     *
     * @return Book
     */
    public function setSubject(\AppBundle\Entity\Subject $subject = null) {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \AppBundle\Entity\Subject
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * @var string
     */
    private $book_code;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bookContents;

    /**
     * @var \AppBundle\Entity\Category
     */
    private $category;


    /**
     * Set bookCode
     *
     * @param string $bookCode
     *
     * @return Book
     */
    public function setBookCode($bookCode)
    {
        $this->book_code = $bookCode;

        return $this;
    }

    /**
     * Get bookCode
     *
     * @return string
     */
    public function getBookCode()
    {
        return $this->book_code;
    }

    /**
     * Add bookContent
     *
     * @param \AppBundle\Entity\BookContent $bookContent
     *
     * @return Book
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

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Book
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bookUnits;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bookUnits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bookUnit
     *
     * @param \AppBundle\Entity\BookUnit $bookUnit
     *
     * @return Book
     */
    public function addBookUnit(\AppBundle\Entity\BookUnit $bookUnit)
    {
        $this->bookUnits[] = $bookUnit;

        return $this;
    }

    /**
     * Remove bookUnit
     *
     * @param \AppBundle\Entity\BookUnit $bookUnit
     */
    public function removeBookUnit(\AppBundle\Entity\BookUnit $bookUnit)
    {
        $this->bookUnits->removeElement($bookUnit);
    }

    /**
     * Get bookUnits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBookUnits()
    {
        return $this->bookUnits;
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
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Book
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
     * @return Book
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
     * @param \AppBundle\Entity\User $createdBy
     *
     * @return Book
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
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     *
     * @return Book
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
}
