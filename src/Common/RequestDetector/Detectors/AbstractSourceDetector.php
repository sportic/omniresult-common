<?php

namespace Sportic\Omniresult\Common\RequestDetector\Detectors;

use ByTIC\GouttePhantomJs\Clients\ClientFactory;
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
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public static function generateCrawler($url)
    {
        $client = ClientFactory::getGoutteClient();
        return $client->request(
            'GET',
            $url
        );
    }

    /**
     * @inheritDoc
     */
    public function doInvestigation()
    {
        parent::doInvestigation();
    }
}
