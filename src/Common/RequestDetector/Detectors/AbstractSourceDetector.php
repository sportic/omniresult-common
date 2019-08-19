<?php

namespace Sportic\Omniresult\Common\RequestDetector\Detectors;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use \Symfony\Component\DomCrawler\Crawler;

/**
 * Class AbstractSourceDetector
 * @package Sportic\Omniresult\Common\RequestDetector\Detectors
 */
class AbstractSourceDetector extends AbstractDetector
{
    /**
     * @var Crawler
     */
    protected $crawler;

    /**
     * AbstractSourceDetector constructor.
     * @param Crawler $crawler
     */
    public function __construct($crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * @param Crawler $crawler
     * @return DetectorResult
     */
    public static function detect($crawler)
    {
        $detector = new static($crawler);
        return $detector->investigate();
    }

    /**
     * @inheritDoc
     */
    public function doInvestigation()
    {
        parent::doInvestigation();
    }
}
