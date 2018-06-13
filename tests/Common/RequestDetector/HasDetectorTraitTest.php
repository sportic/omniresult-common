<?php

namespace Sportic\Omniresult\Common\Tests\Common\RequestDetector;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;

/**
 * Class HasDetectorTraitTest
 * @package Sportic\Omniresult\Common\Tests\Common\RequestDetector
 */
class HasDetectorTraitTest extends AbstractTest
{
    public function testDetect()
    {
        $client = new FakeTimerClient();
        $result = $client->detect('https://packagist.org/');

        self::assertInstanceOf(DetectorResult::class, $result);
        self::assertFalse($result->isValid());
        self::assertEmpty($result->getClient());
        self::assertEmpty($result->getAction());
        self::assertSame([], $result->getParams());
    }

    public function testGetDetectorClassName()
    {
        $client = new FakeTimerClient();
        self::assertSame(
            'Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\RequestDetector',
            $client->getDetectorClassName()
        );
    }
}