<?php

declare(strict_types = 1);

namespace cse\helpers;

/**
 * Class Phone
 *
 * @package cse\helpers
 */
class Phone
{
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
}