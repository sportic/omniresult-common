<?php

namespace Sportic\Timing\CommonClient\Models;

/**
 * Class Event
 * @package Sportic\Timing\CommonClient\Models
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
