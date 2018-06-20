<?php

namespace Sportic\Omniresult\Common\Models;

use Sportic\Omniresult\Common\Helper;
use Sportic\Omniresult\Common\Utility\ParametersTrait;

/**
 * Class AbstractModel
 * @package Sportic\Timing\RaceTecClient\Models
 */
abstract class AbstractModel
{
    use ParametersTrait;

    /**
     * AbstractModel constructor.
     *
     * @param array $parameters
     */
    public function __construct($parameters = [])
    {
        $this->setParameters($parameters);
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
     * @return string
     */
    public function getParameters(): string
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * @return array
     */
    public function __toArray()
    {
        $properties = get_object_vars($this);
        $return = [];
        foreach ($properties as $name => $value) {
            $value = is_object($value) ? Helper::objectToArray($value) : $value;
            $return[$name] = $value;
        }
        return $return;
    }
}
