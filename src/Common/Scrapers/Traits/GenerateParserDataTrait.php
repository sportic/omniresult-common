<?php

namespace Sportic\Omniresult\Common\Scrapers\Traits;

/**
 * Trait GenerateParserDataTrait
 * @package Sportic\Omniresult\Common\Scrapers\Traits
 */
trait GenerateParserDataTrait
{

    /**
     * @return array
     */
    protected function getParserData()
    {
        if (method_exists($this, 'generateParserData')) {
            return $this->generateParserData();
        }

        $request = $this->getRequest();

        $data = [
            'scrapper' => $this,
            'request' => $request,
            'crawler' => $this->getCrawler(),
            'response' => $this->getClient()->getResponse(),
        ];

        return $data;
    }
}
