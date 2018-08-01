<?php

namespace Sportic\Omniresult\Common\Tests\Common;

use Sportic\Omniresult\Common\Helper;
use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\Common\Tests
 */
class TimingClientTest extends AbstractTest
{
    public function testGetName()
    {
        $client = new FakeTimerClient();
        self::assertSame('FakeTimer', $client->getName());
    }
}
