<?php

namespace Sportic\Omniresult\Common\Tests;

use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;
use Sportic\Omniresult\Omniresult;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\Common\Tests
 */
class OmniresultTest extends AbstractTest
{
    public function testRegisterWithObject()
    {
        $client = new Fixtures\FakeTimer\FakeTimerClient();
        Omniresult::register($client);

        self::assertSame($client, Omniresult::create('FakeTimer'));
    }

    public function testRegisterWithString()
    {
        Omniresult::register('FakeTimer');

        self::assertInstanceOf(FakeTimerClient::class, Omniresult::create('FakeTimer'));
    }
}
