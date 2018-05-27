<?php

namespace Sportic\Timing\CommonClient\Models;

/**
 * Class Split
 * @package Sportic\Timing\CommonClient\Models
 */
class Split extends AbstractModel
{
    protected $name;
    protected $time;
    protected $timeFromStart;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getTimeFromStart()
    {
        return $this->timeFromStart;
    }
}
