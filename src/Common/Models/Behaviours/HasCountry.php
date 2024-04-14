<?php


namespace Sportic\Omniresult\Common\Models\Behaviours;


/**
 *
 */
trait HasCountry
{

    protected $country;

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }
}
