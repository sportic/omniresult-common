<?php

namespace Sportic\Omniresult\Common\Tests;

use Sportic\Omniresult\Common\Helper;

/**
 * Class HelperTest
 * @package Sportic\Omniresult\Common\Tests
 */
class HelperTest extends AbstractTest
{
    /**
     * @param $href
     * @param $parameter
     * @param $value
     * @dataProvider parseParameterFromHrefData
     */
    public function testParseParameterFromHref($href, $parameter, $value)
    {
        $resultedValue = Helper::parseParameterFromHref($href, $parameter);
        self::assertSame($value, $resultedValue);
    }

    /**
     * @return array
     */
    public function parseParameterFromHrefData()
    {
        return[
            ['results.aspx?CId=16648&RId=172','RId','172'],
            ['http://cronometraj.racetecresults.com/results.aspx?CId=16648&RId=170','RId','170']
        ];
    }
}
