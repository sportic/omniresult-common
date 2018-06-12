<?php

namespace Sportic\Omniresult\Common;

use Sportic\Omniresult\Common\Parsers\AbstractParser;
use Sportic\Omniresult\Common\Scrapers\AbstractScraper;

/**
 * Class TimingClient
 * @package Sportic\Omniresult\Common
 */
abstract class TimingClient implements TimingClientInterface
{
    /**
     * @return mixed
     */
    public function getName()
    {
        $path = explode('\\', static::class);
        return str_replace(['Client'], '', array_pop($path));
    }

    /**
     * Supports Detect
     *
     * @return boolean True if this gateway supports the authorize() method
     */
    public function supportsDetect()
    {
        return method_exists($this, 'hasDetector') && $this->hasDetector();
    }

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
