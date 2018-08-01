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
                'time' => null,
                'category' => null,
                'gender' => null,
                'country' => null,
                'status' => null,
                'href' => null,
                'splits' => [],
                'parameters' => null,
            ],
            $result->toArray()
        );
    }
}
