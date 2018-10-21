<?php

namespace Sportic\Omniresult\Common\Tests\Common\Parsers;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Parsers\EventPage;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class AbstractParsersTest
 * @package Sportic\Omniresult\Common\Tests\Common\Parsers
 */
class AbstractParsersTest extends AbstractTest
{

    public function testInitCrawlerFromData()
    {
        $crawler = new Crawler();

        $parser = new EventPage();
        $parser->initialize([
            'crawler' => $crawler
        ]);

        self::assertSame($crawler, $parser->getCrawler());
    }
}
