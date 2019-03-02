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


    /**
     * @param $phone
     * @param string $format
     * @param bool $isMask
     * @param string $pattern
     * @param array $mask
     * @param string $expected
     *
     * @dataProvider providerFormat
     */
    public function testFormat($phone, string $format, bool $isMask, string $pattern, array $mask, string $expected): void
    {
        $this->assertEquals($expected, Phone::format($phone, $format, $isMask, $pattern, $mask));
    }

    /**
     * @return array
     */
    public function providerFormat(): array
    {
        return [
            [
                4455,
                Phone::FORMAT_DEFAULT,
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '44-55'
            ],
            [
                3344455,
                Phone::FORMAT_DEFAULT,
                false,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '3344455'
            ],
            [
                '+1 222 33 444 55',
                Phone::FORMAT_DEFAULT,
                true,
                '(.{2})(.{3})(.{2})(.{3})(.*)',
                Phone::REVERT_MASK,
                '+1 (222) 33-444-55'
            ],
            [
                '(222) 333-4455',
                Phone::FORMAT_DEFAULT,
                false,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '+ (222) 333-44-55'
            ],
            [
                '((222) 333-44-55',
                Phone::FORMAT_DEFAULT,
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '(222) 333-44-55'
            ],
            [
                12223334455,
                '$3-$4-$5',
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '333-44-55'
            ],
            [
                '222 333-4455',
                '$2',
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '222'
            ],
            [
                '222-333-44-55',
                '$1',
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                ''
            ],
            [
                '(222)3334455',
                Phone::FORMAT_DEFAULT,
                true,
                '(.{2})(.{2})(.{2})(.{4})(.*)',
                Phone::REVERT_MASK,
                '(2223) 33-44-55'
            ],
            [
                '+122233344-55',
                '$1 $2 $3 $4 $5 $6',
                true,
                '(.{2})(.{2})(.{2})(.{2})(.{2})(.*)',
                ['$6' => '1$', '$5' => '2$', '$4' => '3$', '$3' => '4$', '$2' => '5$', '$1' => '6$'],
                '1 22 23 33 44 55'
            ],
            [
                '1-2223334455',
                '$2 $3 $4 $5 $6',
                true,
                '(.{2})(.{2})(.{2})(.{2})(.{2})(.*)',
                ['$6' => '1$', '$5' => '2$', '$4' => '3$', '$3' => '4$', '$2' => '5$', '$1' => '6$'],
                '22 23 33 44 55'
            ],
            [
                '222-333-4455   -Hello!',
                Phone::FORMAT_DEFAULT,
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '(222) 333-44-55'
            ],
            [
                '+1 - 2223334455',
                '$1 ($2) $3 $4$5',
                true,
                Phone::PATTERN,
                Phone::REVERT_MASK,
                '1 (222) 333 4455'
            ],
        ];
    }


    /**
     * @param $phone
     * @param string $format
     * @param string $pattern
     * @param array $mask
     * @param string $expected
     *
     * @dataProvider providerHide
     */
    public function testHide($phone, string $format, string $expected): void
    {
        $this->assertEquals($expected, Phone::hide($phone, $format));
    }

    /**
     * @return array
     */
    public function providerHide(): array
    {
        return [
            [
                4455,
                Phone::FORMAT_HIDE,
                '***-**-55'
            ],
            [
                3344455,
                Phone::FORMAT_HIDE,
                '***-**-55'
            ],
            [
                '+1 222 33 444 55',
                Phone::FORMAT_HIDE,
                '+1 (222) ***-**-55'
            ],
            [
                '(222) 333-4455',
                Phone::FORMAT_HIDE,
                '(222) ***-**-55'
            ],
            [
                '((222) 333-44-55',
                Phone::FORMAT_HIDE,
                '(222) ***-**-55'
            ],
            [
                12223334455,
                '**-***-$5',
                '**-***-55'
            ],
            [
                '222 333-4455',
                '$2',
                '222'
            ],
            [
                '222-333-44-55',
                '$1',
                ''
            ],
            [
                '(222)3334455',
                Phone::FORMAT_HIDE,
                '(222) ***-**-55'
            ],
        ];
    }

    /**
     * @param $phone
     * @param int $sizeMin
     * @param int $sizeMax
     * @param $expected
     *
     * @dataProvider providerExtract
     */
    public function testExtract($phone, int $sizeMin, int $sizeMax, $expected): void
    {
        $this->assertEquals($expected, Phone::extract($phone, $sizeMin, $sizeMax));
    }

    /**
     * @return array
     */
    public function providerExtract(): array
    {
        return [
            [
                4455,
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                null
            ],
            [
                3344455,
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                3344455
            ],
            [
                3344455,
                Phone::SIZE_MAX,
                Phone::SIZE_MAX,
                null
            ],
            [
                '+1 222 33 444 55',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                12223344455
            ],
            [
                '(222) 333-4455',
                Phone::SIZE_MIN,
                Phone::SIZE_MIN,
                null
            ],
            [
                '((222) 333-44-55',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                2223334455
            ],
            [
                '222-333-4455   -Hello!',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                2223334455
            ],
            [
                '+1 - 2223334455 Hello 67',
                Phone::SIZE_MIN,
                11,
                null
            ],
        ];
    }


    /**
     * @param $phone
     * @param int $sizeMin
     * @param int $sizeMax
     * @param $expected
     *
     * @dataProvider providerExist
     */
    public function testExist($phone, int $sizeMin, int $sizeMax, $expected): void
    {
        $this->assertEquals($expected, Phone::exist($phone, $sizeMin, $sizeMax));
    }

    /**
     * @return array
     */
    public function providerExist(): array
    {
        return [
            [
                4455,
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                false
            ],
            [
                3344455,
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                true
            ],
            [
                3344455,
                Phone::SIZE_MAX,
                Phone::SIZE_MAX,
                false
            ],
            [
                '+1 222 33 444 55',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                true
            ],
            [
                '(222) 333-4455',
                Phone::SIZE_MIN,
                Phone::SIZE_MIN,
                false
            ],
            [
                '((222) 333-44-55',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                true
            ],
            [
                '222-333-4455   -Hello!',
                Phone::SIZE_MIN,
                Phone::SIZE_MAX,
                true
            ],
            [
                '+1 - 2223334455 Hello 67',
                Phone::SIZE_MIN,
                11,
                false
            ],
        ];
    }
}