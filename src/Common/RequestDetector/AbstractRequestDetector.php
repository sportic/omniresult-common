<?php

namespace Sportic\Omniresult\Common\RequestDetector;

/**
 * Class AbstractRequestDetector
 * @package Sportic\Omniresult\Common\RequestDetector
 */
abstract class AbstractRequestDetector
{
    protected $url;

    protected $urlComponents = null;

    protected $result;

    /**
     * AbstractRequestDetector constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
        $this->result = new DetectorResult();
    }


    /**
     * @param $url
     * @return DetectorResult
     */
    public static function detect($url)
    {
        $detector = new static($url);
        return $detector->investigate();
    }

    /**
     * @return DetectorResult
     */
    public function investigate()
    {
        $this->doInvestigation();
        return $this->getResult();
    }

    protected function doInvestigation()
    {
        $this->prepareInvestigation();
        if (!$this->isValidRequest()) {
            return;
        }

        $this->getResult()->setValid(true);

        $this->getResult()->setAction($this->detectAction());

        $params = $this->detectParams();
        $this->getResult()->setParams(is_array($params) ? $params : []);
    }

    protected function prepareInvestigation()
    {
    }


    /**
     * @param $component
     * @return mixed
     */
    protected function getUrlComponent($component)
    {
        if ($this->urlComponents === null) {
            $this->initUrlComponents();
        }
        return $this->urlComponents[$component];
    }

    protected function initUrlComponents()
    {
        $this->urlComponents = parse_url($this->url);
    }

    /**
     * @return bool
     */
    protected function isValidRequest()
    {
        return false;
    }

    /**
     * @return string
     */
    abstract protected function detectAction();

    /**
     * @return array
     */
    abstract protected function detectParams();

    /**
     * @return DetectorResult
     */
    public function getResult(): DetectorResult
    {
        return $this->result;
    }
}