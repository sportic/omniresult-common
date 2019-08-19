<?php

namespace Sportic\Omniresult\Common\Tests\Common\RequestDetector;

use Sportic\Omniresult\Common\RequestDetector\DetectorResult;
use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\RequestDetector;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\RequestDetectors\SourceDetector;

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

    /**
     * @dataProvider dataGetDetectorClassName
     * @param $type
     * @param $class
     */
    public function testGetDetectorClassName($type, $class)
    {
        $client = new FakeTimerClient();
        self::assertSame(
            $class,
            $client->getDetectorClassName($type)
        );
    }

    /**
     * @return array
     */
    public function dataGetDetectorClassName()
    {
        return [
            [null, RequestDetector::class],
            ['Url', RequestDetector::class],
            ['Source', SourceDetector::class],
        ];
    }
}
