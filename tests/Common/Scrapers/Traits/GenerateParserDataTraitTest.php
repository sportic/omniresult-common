<?php

namespace Sportic\Omniresult\Common\Tests\Common\Scrapers\Traits;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Parsers\EventPage as ParserPage;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Scrapers\EventPage as EventPageScraper;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Scrapers\EventPage as ScraperPage;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class GenerateParserDataTraitTest
 * @package Sportic\Omniresult\Common\Tests\Common\Scrapers\Traits
 */
class GenerateParserDataTraitTest extends AbstractTest
{

    public function test_PassScrapperInParserData()
    {
        $scraper = \Mockery::mock(EventPageScraper::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $scraper->shouldReceive('getParserName')->andReturn(ParserPage::class);
        $scraper->shouldReceive('getRequest')->andReturn([]);
        $scraper->shouldReceive('getCrawler')->andReturn(new Crawler());
        $scraper->shouldReceive('populateParserDataResponse');
        $parser = $scraper->execute();

        self::assertInstanceOf(EventPageScraper::class, $parser->getScraper());
    }
}
