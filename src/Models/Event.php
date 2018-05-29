<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Event
 * @package Sportic\Omniresult\Common\Models
 */
class Event extends AbstractModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $id;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
