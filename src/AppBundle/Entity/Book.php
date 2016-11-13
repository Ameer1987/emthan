<?php

namespace AppBundle\Entity;

/**
 * Book
 */
class Book
{
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
     * @var \AppBundle\Entity\BookType
     */
    private $bookType;

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
     * Set price
     *
     * @param string $price
     *
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Book
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set pages
     *
     * @param integer $pages
     *
     * @return Book
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return integer
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set sentToPrintDate
     *
     * @param \DateTime $sentToPrintDate
     *
     * @return Book
     */
    public function setSentToPrintDate($sentToPrintDate)
    {
        $this->sentToPrintDate = $sentToPrintDate;

        return $this;
    }

    /**
     * Get sentToPrintDate
     *
     * @return \DateTime
     */
    public function getSentToPrintDate()
    {
        return $this->sentToPrintDate;
    }

    /**
     * Set finishPrintDate
     *
     * @param \DateTime $finishPrintDate
     *
     * @return Book
     */
    public function setFinishPrintDate($finishPrintDate)
    {
        $this->finishPrintDate = $finishPrintDate;

        return $this;
    }

    /**
     * Get finishPrintDate
     *
     * @return \DateTime
     */
    public function getFinishPrintDate()
    {
        return $this->finishPrintDate;
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
     * Set bookType
     *
     * @param \AppBundle\Entity\BookType $bookType
     *
     * @return Book
     */
    public function setBookType(\AppBundle\Entity\BookType $bookType = null)
    {
        $this->bookType = $bookType;

        return $this;
    }

    /**
     * Get bookType
     *
     * @return \AppBundle\Entity\BookType
     */
    public function getBookType()
    {
        return $this->bookType;
    }

    /**
     * Set responsibility
     *
     * @param \AppBundle\Entity\Employee $responsibility
     *
     * @return Book
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
     * Set subject
     *
     * @param \AppBundle\Entity\Subject $subject
     *
     * @return Book
     */
    public function setSubject(\AppBundle\Entity\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \AppBundle\Entity\Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }
}
