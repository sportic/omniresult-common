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
}
