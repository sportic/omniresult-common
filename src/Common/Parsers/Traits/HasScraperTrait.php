<?php

namespace Sportic\Omniresult\Common\Parsers\Traits;

use Sportic\Omniresult\Common\Scrapers\AbstractScraper;

/**
 * Trait HasScraperTrait
 * @package Sportic\Omniresult\Common\Parsers\Traits
 */
trait HasScraperTrait
{
    /**
     * @return AbstractScraper
     */
    public function getScraper(): AbstractScraper
    {
        return $this->getParameter('scraper');
    }

    /**
     * @param AbstractScraper $scraper
     */
    public function setScraper(AbstractScraper $scraper)
    {
        $this->setParameter('scraper', $scraper);
    }

    /**
     * @return bool
     */
    public function hasScraper()
    {
        return $this->getScraper() instanceof AbstractScraper;
    }
}
