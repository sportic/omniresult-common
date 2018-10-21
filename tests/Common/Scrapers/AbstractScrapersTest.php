<?php

namespace Sportic\Omniresult\Common\Tests\Common\Scrapers;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Parsers\EventPage as ParserPage;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Scrapers\EventPage;

/**
 * Class AbstractScrapersTest
 * @package Sportic\Omniresult\Common\Tests\Common\Scrapers
 */
class AbstractScrapersTest extends AbstractTest
{
    public function testGetNewParser()
    {
        $scraper = new EventPage();

        self::assertInstanceOf(ParserPage::class, $scraper->getNewParser());
    }
}
