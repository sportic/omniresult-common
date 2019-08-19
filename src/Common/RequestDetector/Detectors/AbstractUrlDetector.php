<?php

namespace Sportic\Omniresult\Common\RequestDetector\Detectors;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;

/**
 * Class AbstractUrlDetector
 * @package Sportic\Omniresult\Common\RequestDetector\Detectors
 */
abstract class AbstractUrlDetector extends AbstractDetector
{
    protected $url;

    protected $urlComponents = null;

    /**
     * AbstractRequestDetector constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
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
     * @param null $default
     * @return mixed
     */
    protected function getUrlComponent($component, $default = null)
    {
        if ($this->urlComponents === null) {
            $this->initUrlComponents();
        }
        return isset($this->urlComponents[$component]) ? $this->urlComponents[$component] : $default;
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
}
