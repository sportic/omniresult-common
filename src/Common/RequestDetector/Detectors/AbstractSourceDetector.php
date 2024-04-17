<?php

namespace Sportic\Omniresult\Common\RequestDetector\Detectors;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use Symfony\Component\BrowserKit\HttpBrowser;
use \Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class AbstractSourceDetector
 * @package Sportic\Omniresult\Common\RequestDetector\Detectors
 */
abstract class AbstractSourceDetector extends AbstractDetector
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
        $httpClient = HttpClient::create(['verify_peer' => false, 'verify_host' => false]);
        $browser = new HttpBrowser($httpClient, null, null);

        return $browser->request(
            'GET',
            $url
        );
    }
}
