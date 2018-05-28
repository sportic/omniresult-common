<?php

namespace Sportic\Timing\CommonClient;

/**
 * Class TimingClient
 * @package Sportic\Timing\CommonClient
 */
class TimingClient implements TimingClientInterface
{

    /**
     * @param $class
     * @param $parameters
     * @return mixed
     */
    protected function createRequest($class, $parameters)
    {

        $obj = new $class($this->httpClient, $this->httpRequest);

        return $obj->initialize(array_replace($this->getParameters(), $parameters));
    }
}
