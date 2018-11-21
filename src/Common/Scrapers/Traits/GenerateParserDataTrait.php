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
            'scraper' => $this,
            'request' => $request,
            'crawler' => $this->getCrawler(),
        ];
        $this->populateParserDataResponse($data);

        return $data;
    }

    /**
     * @param $data
     * @return void
     */
    protected function populateParserDataResponse(&$data)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $response = $this->getClient()->getResponse();
        if ($response instanceof \Symfony\Component\BrowserKit\Response) {
            $data['response'] = $response;
        }
    }
}
