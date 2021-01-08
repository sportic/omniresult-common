<?php

namespace Sportic\Omniresult\Common\Tests\Common\Scrapers;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Parsers\EventPage as ParserPage;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Scrapers\EventPage as ScraperPage;

/**
 * Class AbstractScrapersTest
 * @package Sportic\Omniresult\Common\Tests\Common\Scrapers
 */
class AbstractScrapersTest extends AbstractTest
{
    public function testGetNewParser()
    {
        $scraper = new ScraperPage();

        self::assertInstanceOf(ParserPage::class, $scraper->getNewParser());
    }

    public function test_executeReturnsParser()
    {
        $scraper = \Mockery::mock(ScraperPage::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $scraper->shouldReceive('getParserName')->andReturn(ParserPage::class);
        $scraper->shouldReceive('getParserData')->andReturn([]);

        $parser = $scraper->execute();

        self::assertInstanceOf(ParserPage::class, $parser);
    }
}
