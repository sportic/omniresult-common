<?php

namespace Sportic\Omniresult\Common\Tests;

use Mockery as m;
use Sportic\Omniresult\Common\TimingClient\TimingClientFactory;
use Sportic\Omniresult\Omniresult;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\Common\Tests
 */
class OmniresultTest extends AbstractTest
{

    public function testCallStatic()
    {
        /** @var TimingClientFactory $factory */
        $factory = m::mock('\Sportic\Omniresult\Common\TimingClient\TimingClientFactory');
        $factory->shouldReceive('testMethod')->with('some-argument')->once()->andReturn('some-result');

        Omniresult::setFactory($factory);
        $result = Omniresult::testMethod('some-argument');
        static::assertSame('some-result', $result);
    }
}
