<?php

namespace Sportic\Omniresult\Common\Content;

use ArrayAccess;
use Sportic\Omniresult\Common\Utility\Traits\ArrayMethodsTrait;
use Sportic\Omniresult\Common\Utility\Traits\ArrayAccessTrait;
use Sportic\Omniresult\Common\Helper;

/**
 * Class AbstractContent
 * @package Sportic\Omniresult\Common\Content
 */
abstract class AbstractContent implements ArrayAccess
{
    use ArrayAccessTrait, ArrayMethodsTrait;

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
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        if (is_array($parameters)) {
            foreach ($parameters as $name => $value) {
                $method = 'set' . ucfirst(Helper::camelCase($name));
                if (method_exists($this, $method)) {
                    $this->$method($value);
                } elseif (property_exists($this, $name)) {
                    $this->{$name} = $value;
                } else {
                    $this->setParameter($name, $value);
                }
            }
        }
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
