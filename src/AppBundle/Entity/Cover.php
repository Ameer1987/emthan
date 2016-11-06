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
}

