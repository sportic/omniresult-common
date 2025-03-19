<?php

namespace Sportic\Omniresult\Common\Tests\Common\Models\Behaviours;

use PHPUnit\Framework\TestCase;
use Sportic\Omniresult\Common\Models\Athlete;

/**
 *
 */
class HasGenderTest extends TestCase
{
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
