<?php

namespace Sportic\Omniresult\Common\Models;

/**
 * Class Race
 * @package Sportic\Omniresult\Common\Models
 */
class Race extends AbstractModel
{
    use Behaviours\HasId;
    use Behaviours\HasHref;

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
