<?php

namespace Sportic\Omniresult\Common\RequestDetector;

use Sportic\Omniresult\Common\TimingClientInterface;

/**
 * Class DetectorResult
 * @package Sportic\Omniresult\Common\ClientDetector
 */
class DetectorResult
{
    protected $client;

    protected $valid = false;

    protected $action;

    protected $params = [];

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }

    /**
     * @return bool
     */
    public function hasClient()
    {
        return $this->getClient() instanceof TimingClientInterface;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client): void
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
