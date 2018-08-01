<?php

namespace Sportic\Omniresult\Common\Tests\Common\RequestDetector;

use Sportic\Omniresult\Common\RequestDetector\ClientDetector;
use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;
use Sportic\Omniresult\Common\TimingClient\TimingClientCollection;

/**
 * Class ClientDetectorTest
 * @package Sportic\Omniresult\Common\Tests\Common\RequestDetector
 */
class ClientDetectorTest extends AbstractTest
{
    public function testDetect()
    {
        $client = new FakeTimerClient();

        $collection = new TimingClientCollection();
        $collection->set('fake', $client);

        $result = ClientDetector::detect('https://www.trackmyrace.com/en/', $collection);

        self::assertInstanceOf(DetectorResult::class, $result);
        self::assertTrue($result->isValid());
        self::assertSame($client, $result->getClient());
        self::assertSame('action', $result->getAction());
        self::assertSame(['var' => 'value'], $result->getParams());
    }

    public function testDetectEmptyCollection()
    {
        $collection = new TimingClientCollection();
        $result = ClientDetector::detect('https://www.trackmyrace.com/en/', $collection);

        self::assertInstanceOf(DetectorResult::class, $result);
        self::assertFalse($result->isValid());
    }
}
