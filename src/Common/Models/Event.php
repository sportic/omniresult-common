<?php

namespace Sportic\Omniresult\Common\Models;

use DateTime;

/**
 * Class Event
 * @package Sportic\Omniresult\Common\Models
 */
class Event extends AbstractModel
{

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var DateTime
     */
    protected $date;

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
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return bool
     */
    public function hasDate()
    {
        return $this->getDate() instanceof DateTime;
    }

    /**
     * @param string $format
     * @param string $date
     */
    public function setDateFromFormat($format, $date): void
    {
        $date = DateTime::createFromFormat($format, $date);
        if ($date instanceof DateTime) {
            $this->setDate($date);
        }
    }
}
