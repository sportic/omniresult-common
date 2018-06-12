<?php

namespace Sportic\Omniresult\Common\Tests\Common\RequestDetector;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\FakeTimerClient;

/**
 * Class HasDetectorTraitTest
 * @package Sportic\Omniresult\Common\Tests\Common\RequestDetector
 */
class HasDetectorTraitTest extends AbstractTest
{
    public function testGetDetectorClassName()
    {
        $client = new FakeTimerClient();
        self::assertSame(
            'Sportic\Omniresult\Common\Tests\Fixtures\FakeTimer\RequestDetector',
            $client->getDetectorClassName()
        );
    }
}
