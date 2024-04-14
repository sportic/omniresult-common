<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class RaceCategory
 * @package Sportic\Omniresult\Common\Models
 */
class RaceCategory extends AbstractModel
{
    use Behaviours\HasId;

    /**
     * @var string
     */
    protected ?string $name = null;

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
