<?php

declare(strict_types=1);

namespace cse\helpers;

/**
 * Class Phone
 *
 * @package cse\helpers
 */
class Phone
{
    const FORMAT_DEFAULT = '+$1 ($2) $3-$4-$5';
    const FORMAT_HIDE =  '+$1 ($2) ***-**-$5';

    const MASK = '?';
    const PATTERN = '(.{2})(.{2})(.{3})(.{3})(.*)';
    const REVERT_MASK = ['$5' => '1$', '$4' => '2$', '$3' => '3$', '$2' => '4$', '$1' => '5$'];

    const SIZE_MIN = 7;
    const SIZE_MAX = 14;

    /**
     * Clear phone number
     *
     * @param $phone
     *
     * @return string
     */
    public static function clear($phone): string
    {
        return preg_replace('/[^0-9]+/', '', $phone);
    }

    /**
     * Format phone number
     *
     * @param $phone
     * @param string $format
     * @param bool $isMask
     * @param string $pattern
     * @param array $revert
     *
     * @return string
     */
    public static function format($phone, string $format = self::FORMAT_DEFAULT, bool $isMask = true, string $pattern = self::PATTERN, array $revert = self::REVERT_MASK): string
    {
        $phone = self::clear($phone);

        if ($isMask) $phone = str_pad($phone, 11, self::MASK, STR_PAD_LEFT);

        $result = preg_replace(
            '/' . $pattern . '/',
            strrev(strtr($format, $revert)),
            strrev($phone)
        );

        if ($isMask) {
            $mask_position = stripos($result, self::MASK);
            if (is_int($mask_position)) {
                if ($result[$mask_position-1] == ')' || $result[$mask_position-1] == '-') $mask_position--;
                $result = substr($result,0, $mask_position);
            }
        }

        return trim(strrev($result));
    }

    /**
     * Hide phone number
     *
     * @param $phone
     * @param string $format
     *
     * @return string
     */
    public static function hide($phone, $format = self::FORMAT_HIDE): string
    {
        return self::format($phone, $format);
    }

    /**
     * Extract phone number from string
     *
     * @param $string
     * @param int $minSize
     * @param int $maxSize
     *
     * @return null|string
     */
    public static function extract($string, int $minSize = self::SIZE_MIN, int $maxSize = self::SIZE_MAX): ?string
    {
        $string = self::clear($string);
        $size = strlen($string);

        return $size >= $minSize && $size <= $maxSize ? $string : null;
    }

    /**
     * Exist phone number to string
     *
     * @param $string
     * @param int $minSize
     * @param int $maxSize
     *
     * @return bool
     */
    public static function exist($string, int $minSize = self::SIZE_MIN, int $maxSize = self::SIZE_MAX): bool
    {
        return (bool) self::extract($string, $minSize, $maxSize);
    }

    /**
     * Check phone number
     *
     * @param $phone
     * @param int $minSize
     * @param int $maxSize
     *
     * @return bool
     */
    public static function is($phone, int $minSize = self::SIZE_MIN, int $maxSize = self::SIZE_MAX): bool
    {
        $size = strlen((string) $phone);
        return $size >= $minSize && $size <= $maxSize ? self::exist($phone, $minSize, $maxSize) : false;
    }
}