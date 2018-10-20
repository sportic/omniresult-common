<?php

namespace Sportic\Omniresult\Common\Scrapers;

use ByTIC\GouttePhantomJs\Clients\ClientFactory;
use Sportic\Omniresult\Common\Parsers\AbstractParser;
use Sportic\Omniresult\Common\Scrapers\Traits\HasRequestTrait;
use Sportic\Omniresult\Common\Utility\HasCallValidationTrait;
use Sportic\Omniresult\Common\Utility\ParametersTrait;
use Goutte\Client;

/**
 * Class AbstractScraper
 * @package Sportic\Timing\RaceTecClient\Scrapers
 */
abstract class AbstractScraper
{
    use ParametersTrait, HasCallValidationTrait, HasRequestTrait;

    /**
     * @var Client
     */
    protected $client = null;

    /**
     * @return bool|AbstractParser
     */
    public function execute()
    {
        if (!$this->isValidCall()) {
            return false;
        }

        $parser = $this->getNewParser();

        $data = $this->generateParserData();
        $parser->initialize($data);

        return $parser;
    }

    /**
     * @return array
     */
    protected function generateParserData()
    {
        $crawler = $this->getRequest();
        $data = [
            'crawler' => $crawler
        ];

        return $data;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if ($this->client == null) {
            $this->initClient();
        }

        return $this->client;
    }

    protected function initClient()
    {
        $client = $this->generateClient();
        $this->setClient($client);
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    protected function generateClient()
    {
        return ClientFactory::getPhantomJsClient();
    }

    /**
     * @return AbstractParser
     */
    protected function getNewParser()
    {
        $class = $this->getParserName();
        /** @var AbstractParser $parser */
        $parser = new $class();
        $parser->setScraper($this);

        return $parser;
    }

    /**
     * @return string
     */
    protected function getParserName()
    {
        $fullClassName = get_class($this);
        $partsClassName = explode('\\', $fullClassName);
        $classFirstName = array_pop($partsClassName);
        $classNamespacePath = implode('\\', $partsClassName);
        $classNamespacePath = str_replace('\Scrapers', '', $classNamespacePath);

        return $classNamespacePath . '\Parsers\\' . $classFirstName;
    }
}
