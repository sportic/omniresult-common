<?php

namespace Sportic\Omniresult\Common\Scrapers;

use Sportic\Omniresult\Common\Parsers\AbstractParser;
use Sportic\Omniresult\Common\Scrapers\Traits\GenerateParserDataTrait;
use Sportic\Omniresult\Common\Scrapers\Traits\HasRequestTrait;
use Sportic\Omniresult\Common\Utility\HasCallValidationTrait;
use Sportic\Omniresult\Common\Utility\ParametersTrait;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

/**
 * Class AbstractScraper
 * @package Sportic\Timing\RaceTecClient\Scrapers
 */
abstract class AbstractScraper
{
    use ParametersTrait, HasCallValidationTrait;
    use HasRequestTrait, GenerateParserDataTrait;

    /**
     * @var HttpBrowser
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

        $data = $this->getParserData();
        $parser->initialize($data);

        return $parser;
    }

    /**
     * @return HttpBrowser
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
     * @param HttpBrowser $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
    /**
     * @return HttpBrowser
     */
    protected function generateClient()
    {
        $httpClient = HttpClient::create(['verify_peer' => false, 'verify_host' => false]);
        $browser = new HttpBrowser($httpClient, null, null);
        return $browser;
    }

    /**
     * @return AbstractParser
     */
    public function getNewParser()
    {
        $class = $this->getParserName();
        /** @var AbstractParser $parser */
        $parser = new $class();

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
