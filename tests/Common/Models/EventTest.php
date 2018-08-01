<?php

namespace Sportic\Omniresult\Common\Tests\Common\Models;

use Sportic\Omniresult\Common\Models\Event;
use Sportic\Omniresult\Common\Tests\AbstractTest;

/**
 * Class EventTest
 * @package Sportic\Omniresult\Common\Tests\Common\Models
 */
class EventTest extends AbstractTest
{
    public function testToArrayWithEmptyResult()
    {
        $object = new Event();
        self::assertSame(
            [
                'id' => null,
                'name' => null,
                'city' => null,
                'date' => null,
                'parameters' => null,
            ],
            $object->toArray()
        );
    }

    /**
     * @param $format
     * @param $dateOriginal
     * @param $date
     * @dataProvider setDateFromFormatData
     */
    public function testSetDateFromFormat($format, $dateOriginal, $date)
    {
        $object = new Event();
        $object->setDateFromFormat($format, $dateOriginal);

        self::assertSame(
            $date,
            $object->getDate()->format('Y-m-d')
        );
    }

    /**
     * @return array
     */
    public function setDateFromFormatData()
    {
        return [
            ['d/m/Y', '07/07/2018', '2018-07-07'],
        ];
    }
}
