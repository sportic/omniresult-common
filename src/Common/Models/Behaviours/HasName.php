<?php

namespace Sportic\Omniresult\Common\Models\Behaviours;

/**
 *
 */
trait HasName
{
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
