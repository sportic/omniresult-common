<?php

namespace Sportic\Omniresult\Common\Tests\Common\Models;

use Sportic\Omniresult\Common\Models\Result;
use Sportic\Omniresult\Common\Tests\AbstractTest;

/**
 * Class ResultTest
 * @package Sportic\Omniresult\Common\Tests\Common\Models
 */
class ResultTest extends AbstractTest
{
    public function testToArrayWithEmptyResult()
    {
        $result = new Result();
        self::assertSame(
            [
                'id' => null,
                'posGen' => null,
                'posCategory' => null,
                'posGender' => null,
                'bib' => null,
                'fullName' => null,
                'firstName' => null,
                'lastName' => null,
                'time' => null,
                'timeGross' => null,
                'category' => null,
                'gender' => null,
                'country' => null,
                'club' => null,
                'status' => null,
                'notes' => null,
                'href' => null,
                'splits' => [],
                'parameters' => null,
            ],
            $result->toArray()
        );
    }


    /**
     * @dataProvider statusFromPositionData
     * @param $position
     * @param $status
     */
    public function testStatusFromPosition($positionValue, $status)
    {
        foreach (['posGen', 'posCategory', 'posGender'] as $position) {
            $params = [$position => $positionValue];
            $result = new Result($params);
            self::assertSame($status, $result->getStatus());
        }
    }

    /**
     * @return array
     */
    public function statusFromPositionData()
    {
        return [
            ['dsq', 'disqualified'],
            ['DSQ', 'disqualified'],
            ['dns', 'dns'],
            ['DNS', 'dns'],
        ];
    }
}
