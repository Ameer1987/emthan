<?php

namespace AppBundle\Entity;

/**
 * SubBookType
 */
class SubBookType
{
    /**
     * @var string
     */
    private $item;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\SubBookContainerType
     */
    private $subBookContainerType;


    /**
     * Set item
     *
     * @param string $item
     *
     * @return SubBookType
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

    /**
     * Set subBookContainerType
     *
     * @param \AppBundle\Entity\SubBookContainerType $subBookContainerType
     *
     * @return SubBookType
     */
    public function setSubBookContainerType(\AppBundle\Entity\SubBookContainerType $subBookContainerType = null)
    {
        $this->subBookContainerType = $subBookContainerType;

        return $this;
    }

    /**
     * Get subBookContainerType
     *
     * @return \AppBundle\Entity\SubBookContainerType
     */
    public function getSubBookContainerType()
    {
        return $this->subBookContainerType;
    }
}
