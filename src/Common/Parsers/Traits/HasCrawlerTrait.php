<?php

namespace Sportic\Omniresult\Common\Parsers\Traits;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Trait HasCrawlerTrait
 * @package Sportic\Omniresult\Common\Parsers\Traits
 *
 * @method getParameter($key, $default = null)
 * @method setParameter($key, $value)
 */
trait HasCrawlerTrait
{
    /**
     * @return Crawler
     */
    public function getCrawler(): Crawler
    {
        return $this->getParameter('crawler');
    }

    /**
     * @param Crawler $crawler
     */
    public function setCrawler(Crawler $crawler)
    {
        $this->setParameter('crawler', $crawler);
    }
}
