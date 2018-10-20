<?php

namespace Sportic\Omniresult\Common\Scrapers\Traits;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Trait HasCrawlerTrait
 * @package Sportic\Omniresult\Common\Scrapers\Traits
 */
trait HasRequestTrait
{
    /**
     * @var Crawler
     */
    protected $request = null;

    /**
     * @return Crawler
     */
    public function getRequest()
    {
        if (!$this->request) {
            $this->initRequest();
        }

        return $this->request;
    }

    protected function initRequest()
    {
        if (method_exists($this, 'generateRequest')) {
            $this->request = $this->generateRequest();
        } else {
            $this->request = $this->generateCrawler();
        }
    }

    /**
     * @deprecated For the future use generateRequest
     * @return Crawler
     */
    abstract protected function generateCrawler();

    /**
     * @deprecated use getRequest
     * @return Crawler
     */
    public function getCrawler()
    {
        return $this->getRequest();
    }
}