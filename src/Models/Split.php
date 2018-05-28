<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Split
 * @package Sportic\Omniresult\Common\Models
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
