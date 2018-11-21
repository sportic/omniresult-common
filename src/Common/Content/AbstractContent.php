<?php

namespace Sportic\Omniresult\Common\Content;

use ArrayAccess;
use Sportic\Omniresult\Common\Helper;
use Sportic\Omniresult\Common\Utility\ParametersTrait;
use Sportic\Omniresult\Common\Utility\Traits\ArrayAccessTrait;
use Sportic\Omniresult\Common\Utility\Traits\ArrayMethodsTrait;

/**
 * Class AbstractContent
 * @package Sportic\Omniresult\Common\Content
 */
abstract class AbstractContent implements ArrayAccess
{
    use ArrayAccessTrait, ArrayMethodsTrait;
    use ParametersTrait;

    /**
     * AbstractContent constructor.
     *
     * @param $parameters
     */
    public function __construct($parameters = [])
    {
        $this->initialize();
        $this->setParameters($parameters);
    }

    protected function initialize()
    {
    }

    /**
     * @param $name
     * @param $value
     */
    protected function setParameter($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * @return mixed
     */
    public function __toArray()
    {
        return Helper::objectToArray($this->items);
    }
}
