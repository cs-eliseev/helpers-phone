<?php

use cse\helpers\Phone;
use PHPUnit\Framework\TestCase;

class TestPhone extends TestCase
{
    /**
     * @param $phone
     * @param string $expected
     *
     * @dataProvider providerClear
     */
    public function testClear($phone, string $expected): void
    {
        $this->assertEquals($expected, Phone::clear($phone));
    }

    /**
     * @return array
     */
    public function providerClear(): array
    {
        return [
            [
                4455,
                4455
            ],
            [
                3344455,
                3344455
            ],
            [
                '+1 222 33 444 55',
                12223344455
            ],
            [
                '(222) 333-4455',
                2223334455
            ],
            [
                '((222) 333-44-55',
                2223334455
            ],
            [
                12223334455,
                12223334455
            ],
            [
                '222 333-4455',
                2223334455
            ],
            [
                '222-333-44-55',
                2223334455
            ],
            [
                '(222)3334455',
                2223334455
            ],
            [
                '+122233344-55',
                12223334455
            ],
            [
                '1-2223334455',
                12223334455
            ],
            [
                '222-333-4455   -Hello!',
                2223334455
            ],
            [
                '+1 - 2223334455',
                12223334455
            ],
        ];
    }
}