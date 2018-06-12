<?php

namespace Sportic\Omniresult\Common\Tests\Common\TimingClient;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\TimingClient\TimingClientFactory;

/**
 * Class TimingClientFactoryTest
 * @package Sportic\Omniresult\Common\Tests\Common\TimingClient
 */
class TimingClientFactoryTest extends AbstractTest
{
    /**
     * @param $name
     * @param $class
     * @dataProvider getClientClassNameData
     */
    public function testGetClientClassName($name, $class)
    {
        static::assertSame($class, TimingClientFactory::getClientClassName($name));
    }

    /**
     * @return array
     */
    public function getClientClassNameData()
    {
        return [
            ['RaceTec', '\Sportic\Omniresult\RaceTec\RaceTecClient'],
        ];
    }
}
