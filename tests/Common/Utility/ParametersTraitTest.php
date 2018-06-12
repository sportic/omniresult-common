<?php

namespace Sportic\Omniresult\Common\Tests\Common\Utility;

use Sportic\Omniresult\Common\Tests\AbstractTest;
use Sportic\Omniresult\Common\Tests\Fixtures\Utility\EmptyObjectWithParameters;
use Sportic\Omniresult\Common\Tests\Fixtures\Utility\ObjectWithPropertiesAndParameters;

/**
 * Class ParametersTraitTest
 * @package Sportic\Omniresult\Common\Tests\Utility
 */
class ParametersTraitTest extends AbstractTest
{
    public function testInitializeOnEmptyObjectWithParameters()
    {
        $object = new EmptyObjectWithParameters();
        $parameters = [
            'setting1' => '1',
            'setting2' => '2',
        ];

        $object->initialize($parameters);

        self::assertSame($parameters, $object->getParameters());
    }

    public function testInitializeOnObjectWithPropertiesAndParameters()
    {
        $object = new ObjectWithPropertiesAndParameters();
        $parameters = [
            'setting1' => '1',
            'setting2' => '2',
        ];

        $object->initialize($parameters);

        self::assertCount(1, $object->getParameters());
        self::assertSame('2', $object->getParameter('setting2'));
    }
}
