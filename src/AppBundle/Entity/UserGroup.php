<?php

namespace AppBundle\Entity;

/**
 * UserGroup
 */
class UserGroup
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
     * Set item
     *
     * @param string $item
     *
     * @return UserGroup
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

