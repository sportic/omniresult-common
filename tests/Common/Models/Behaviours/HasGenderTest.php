<?php

namespace Sportic\Omniresult\Common\Tests\Common\Models\Behaviours;

use PHPUnit\Framework\TestCase;
use Sportic\Omniresult\Common\Models\Athlete;
use Sportic\Omniresult\Common\Models\Result;

/**
 *
 */
class HasGenderTest extends TestCase
{

    public function testToArray(): void
    {
        $result = new Result();
        $array = $result->toArray();
        self::assertSame(null, $array['gender']);
        $json = json_encode($array);
        self::assertJson($json);
        self::assertStringContainsString(',"gender":null,', $json);

        $result->setGender('w');
        $array = $result->toArray();

        self::assertSame('female', $array['gender']);
        $json = json_encode($array);
        self::assertJson($json);
        self::assertStringContainsString(',"gender":"female",', $json);
    }

    /**
     * @dataProvider data_setGender
     * @return void
     */
    public function test_setGender($input, $expected)
    {
        $athlete = new Athlete();
        $athlete->setGender($input);
        self::assertSame($expected, $athlete->getGender());
    }

    public function data_setGender(): array
    {
        return [
            [null, null],
            ['m', 'male'],
            ['male', 'male'],
            ['f', 'female'],
            ['female', 'female'],
            ['w', 'female'],
        ];
    }
}
