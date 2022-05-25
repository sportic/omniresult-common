<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasTime
{
    protected $time;
    protected $timeGross;

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time): void
    {
        $time = str_replace(',', '.', $time);
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getTimeGross()
    {
        return $this->timeGross;
    }

    /**
     * @param mixed $timeGross
     */
    public function setTimeGross($timeGross): void
    {
        $this->timeGross = $timeGross;
    }
}
