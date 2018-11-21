<?php

namespace Sportic\Omniresult\Common\Tests\Common\Scrapers\Traits;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\Scrapers\EventPage as EventPageScraper;

/**
 * Class GenerateParserDataTraitTest
 * @package Sportic\Omniresult\Common\Tests\Common\Scrapers\Traits
 */
class GenerateParserDataTraitTest extends AbstractTest
{

    public function testPassScrapperInParserData()
    {
        $scraper = new EventPageScraper();
        $parser = $scraper->execute();

        self::assertInstanceOf(EventPageScraper::class, $parser->getScraper());
    }
}
