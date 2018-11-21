<?php

namespace Sportic\Omniresult\Common\Utility;

use Sportic\Omniresult\Common\Exception\InvalidRequestException;
use Sportic\Omniresult\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Trait ParametersTrait
 * @package Sportic\Omniresult\Common\Utility
 */
trait ParametersTrait
{
    /**
     * Internal storage of all of the parameters.
     *
     * @var ParameterBag
     */
    protected $parameters;

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->checkInitParameters();
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function getParameter($key, $default = null)
    {
        $this->checkInitParameters();
        return $this->parameters->get($key, $default);
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasParameter($name)
    {
        $this->checkInitParameters();
        return $this->parameters->has($name);
    }

    /**
     * Get all parameters.
     *
     * @return array An associative array of parameters.
     */
    public function getParameters()
    {
        $this->checkInitParameters();
        return $this->parameters->all();
    }

    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     * @return $this.
     */
    public function initialize(array $parameters = [])
    {
        $this->setParameters($parameters);
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters(array $parameters = [])
    {
        $this->checkInitParameters();

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

        return $this;
    }

    protected function checkInitParameters()
    {
        if (!is_object($this->parameters)) {
            $this->parameters = new ParameterBag();
        }
    }

    /**
     * Validate the request.
     *
     * This method is called internally by gateways to avoid wasting time with an API call
     * when the request is clearly invalid.
     *
     * @param string ... a variable length list of required parameters
     * @throws InvalidRequestException
     */
    public function validate(...$args)
    {
        foreach ($args as $key) {
            $value = $this->getParameter($key);
            if (!isset($value)) {
                throw new InvalidRequestException("The $key parameter is required");
            }
        }
    }
}
