<?php

namespace Sportic\Timing\CommonClient;

use Sportic\Timing\CommonClient\Parsers\AbstractParser;
use Sportic\Timing\CommonClient\Scrapers\AbstractScraper;

/**
 * Class TimingClient
 * @package Sportic\Timing\CommonClient
 */
class TimingClient implements TimingClientInterface
{

    /**
     * @param $class
     * @param $parameters
     * @return AbstractParser
     */
    protected function executeScrapper($class, $parameters)
    {
        $scrapper = static::createScrapper($class, $parameters);

        return $scrapper->execute();
    }

    /**
     * @param $class
     * @param $parameters
     * @return AbstractScraper
     */
    protected static function createScrapper($class, $parameters)
    {
        /** @var AbstractScraper $obj */
        $obj = new $class();
        $obj->initialize($parameters);

        return $obj;
    }
}
