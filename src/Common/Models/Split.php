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
    protected $timeOfDay;

    protected $posGen;
    protected $posCategory;
    protected $posGender;

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

    /**
     * @return mixed
     */
    public function getTimeOfDay()
    {
        return $this->timeOfDay;
    }

    /**
     * @return mixed
     */
    public function getPosGen()
    {
        return $this->posGen;
    }

    /**
     * @return mixed
     */
    public function getPosCategory()
    {
        return $this->posCategory;
    }

    /**
     * @return mixed
     */
    public function getPosGender()
    {
        return $this->posGender;
    }
}
