<?php

namespace AppBundle\Entity;

/**
 * BookType
 */
class BookType
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var integer
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
     * @return BookType
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
