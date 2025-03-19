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

    public function test_parseNamesFromFullFL()
    {
        $result = new Result(['fullNameFL' => 'Mihai Vasile']);

        self::assertSame('Mihai', $result->getFirstName());
        self::assertSame('Vasile', $result->getLastName());
    }

    /**
     * @dataProvider data_parseNamesFromFull
     * @param $fullName
     * @param $firstName
     * @param $lastName
     */
    public function test_parseNamesFromFull($fullName, $firstName, $lastName)
    {
        $result = new Result();
        $result->setFullName($fullName);

        self::assertSame($firstName, $result->getFirstName());
        self::assertSame($lastName, $result->getLastName());
    }

    /**
     * @return array
     */
    public function data_parseNamesFromFull()
    {
        return [
            ['John Doe', 'John', 'Doe'],
            ['John Mike Doe', 'John Mike', 'Doe'],
            ['John, Mike Doe', 'John', 'Mike Doe'],
        ];
    }

    /**
     * @dataProvider data_parseFullName
     * @param $fullName
     * @param $firstName
     * @param $lastName
     */
    public function test_parseFullName($fullName, $firstName, $lastName)
    {
        $result = new Result();
        $result->setFirstName($firstName);
        $result->setLastName($lastName);

        self::assertSame($fullName, $result->getFullName());
    }

    /**
     * @return array
     */
    public function data_parseFullName()
    {
        return [
            ['John', 'John', ''],
            ['John Doe', 'John', 'Doe'],
            ['John Mike Doe', 'John Mike', 'Doe'],
            ['John Mike Doe', 'John', 'Mike Doe'],
        ];
    }

    public function testToArrayWithEmptyResult()
    {
        $result = new Result();
        self::assertSame(
            [
                'parameters' => null,
                'bib' => null,
                'club' => null,
                'status' => null,
                'notes' => null,
                'splits' => [],
                'id' => null,
                'country' => null,
                'dob' => null,
                'yob' => null,
                'gender' => null,
                'href' => null,
                'fullName' => null,
                'firstName' => null,
                'lastName' => null,
                'time' => null,
                'timeGross' => null,
                'result' => null,
                'posGen' => null,
                'posCategory' => null,
                'posGender' => null,
                'category' => null,
            ],
            $result->toArray()
        );
    }


    /**
     * @dataProvider statusFromPositionData
     * @param $positionValue
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
