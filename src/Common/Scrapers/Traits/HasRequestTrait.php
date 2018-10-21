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
     * @var Crawler
     */
    protected $crawler = null;

    /**
     * @return Crawler
     */
    public function getRequest()
    {
        $this->checkInitRequest();
        return $this->request;
    }

    protected function initRequest()
    {
        if (method_exists($this, 'generateRequest')) {
            $this->request = $this->generateRequest();
            $this->crawler = false;
        } else {
            $this->crawler = $this->generateCrawler();
            $this->request = $this->getClient()->getRequest();
        }
    }

    protected function checkInitRequest()
    {
        if ($this->request === null) {
            $this->initRequest();
        }
    }

    /**
     * @return Crawler
     */
    public function getCrawler()
    {
        $this->checkInitRequest();
        return $this->crawler;
    }

    /**
     * @return bool
     */
    protected function hasCrawler()
    {
        return $this->crawler instanceof Crawler;
    }

    /**
     * @return Crawler
     */
    abstract protected function generateCrawler();
}