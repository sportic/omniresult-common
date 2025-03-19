<?php

namespace Sportic\Omniresult\Common\Models;

use Enum;
use Sportic\Omniresult\Common\Helper;
use Sportic\Omniresult\Common\Utility\ParametersTrait;
use UnitEnum;

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
            $value = $this->encodeParam($name, $value);
            $return[$name] = $value;
        }
        return $return;
    }

    /**
     * @param $name
     * @param $value
     * @return array|mixed|string
     */
    protected function encodeParam($name, $value)
    {
        if ($value instanceof UnitEnum) {
            return $value->value;
        }

        if (is_object($value)) {
            return Helper::objectToArray($value);
        }

        return $value;
    }
}
