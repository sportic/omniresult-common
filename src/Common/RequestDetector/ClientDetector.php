<?php

namespace Sportic\Omniresult\Common\RequestDetector;

use Sportic\Omniresult\Common\TimingClient\TimingClientCollection;

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
     */
    public static function detect(string $url, TimingClientCollection $gateways)
    {
        $detector = new self($url, $gateways);
        return $detector->detectClient();
    }

    protected function detectClient()
    {
        foreach ($this->clients as $client) {
            if ($client->supportsDetect()) {
                $result = $client->detect($this->url);
                if ($result->hasClient()) {
                    return $result;
                }
            }
        }
    }
}
