<?php

namespace Sportic\Omniresult\Common\RequestDetector;

use Sportic\Omniresult\Common\RequestDetector\Detectors\AbstractSourceDetector;
use Sportic\Omniresult\Common\TimingClient\TimingClientCollection;
use Sportic\Omniresult\Common\TimingClientInterface;

/**
 * Class ClientDetector
 * @package Sportic\Omniresult\Common\ClientDetector
 */
class ClientDetector
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var TimingClientCollection
     */
    protected $clients;

    /**
     * TimingClientDetector constructor.
     * @param string $url
     * @param TimingClientCollection $gateways
     */
    public function __construct(string $url, TimingClientCollection $gateways)
    {
        $this->url = $url;
        $this->clients = $gateways;
    }

    /**
     * @param string $url
     * @param TimingClientCollection $gateways
     * @return DetectorResult
     */
    public static function detect(string $url, TimingClientCollection $gateways)
    {
        $detector = new self($url, $gateways);
        return $detector->detectClient();
    }

    /**
     * @return DetectorResult
     */
    protected function detectClient()
    {
        foreach ($this->clients as $client) {
            if ($client->supportsDetect()) {
                /** @var TimingClientInterface|HasDetectorTrait $client */
                $result = $client->detect($this->url);
                if ($result->isValid()) {
                    $result->setClient($client);
                    return $result;
                }
            }
        }
        return $this->detectClientFromSource();
    }

    /**
     * @return DetectorResult
     */
    protected function detectClientFromSource()
    {
        foreach ($this->clients as $client) {
            if ($client->supportsDetectFromSource()) {
                $crawler = $crawler ?? AbstractSourceDetector::generateCrawler($this->url);
                /** @var TimingClientInterface|HasDetectorTrait $client */
                $result = $client->detectFromSource($crawler);
                if ($result->isValid()) {
                    $result->setClient($client);
                    return $result;
                }
            }
        }
        return new DetectorResult();
    }
}
