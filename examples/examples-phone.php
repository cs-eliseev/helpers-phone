<?php

require_once __DIR__ . '/../autoload.php';

use cse\helpers\Phone;

$numbers = [
    6677,
    4456677,
    '+1 233 44 566 77',
    '(233) 445-6677',
    '((233) 445-6677',
    2334456677,
    '233 445-6677',
    '233-445-6677',
    '(233)4456677',
    '+123344566-77',
    '1-2334456677',
    '233-445-66-77   -Hello!',
    '+1 - 2334456677'
];

// Example: clear
/**
 * [
 *     '6677',
 *     '4456677',
 *     '12334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '12334456677',
 *     '12334456677',
 *     '2334456677',
 *     '12334456677'
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::clear($phone));
}
echo PHP_EOL;

// Example: format
/**
 * [
 *    '66-77',
 *    '445-66-77',
 *    '+1 (233) 445-66-77',
 *    '(233) 445-66-77',
 *    '(233) 445-66-77',
 *    '(233) 445-66-77',
 *    '(233) 445-66-77',
 *    '(233) 445-66-77',
 *    '(233) 445-66-77',
 *    '+1 (233) 445-66-77',
 *    '+1 (233) 445-66-77',
 *    '(233) 445-66-77',
 *    '+1 (233) 445-66-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::format($phone));
}
/**
 * [
 *    '66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 *    '445-66-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::format($phone, '$3-$4-$5'));
}
/**
 * [
 *    '66-77',
 *    '4-45-66-77',
 *    '1-2334-45-66-77',
 *    '2334-45-66-77',
 *    '2334-45-66-77',
 *    '2334-45-66-77',
 *    '2334-45-66-77',
 *    '2334-45-66-77',
 *    '2334-45-66-77',
 *    '1-2334-45-66-77',
 *    '1-2334-45-66-77',
 *    '2334-45-66-77',
 *    '1-2334-45-66-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::format($phone, '$1-$2-$3-$4-$5', true, '(.{2})(.{2})(.{2})(.{4})(.*)'));
}
/**
 * [
 *    '66-77',
 *    '4 45-66-77',
 *    '1 23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '1 23 34 45-66-77',
 *    '1 23 34 45-66-77',
 *    '23 34 45-66-77',
 *    '1 23 34 45-66-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::format($phone, '$1 $2 $3 $4-$5-$6', true, '(.{2})(.{2})(.{2})(.{2})(.{2})(.*)', [
        '$6' => '1$',
        '$5' => '2$',
        '$4' => '3$',
        '$3' => '4$',
        '$2' => '5$',
        '$1' => '6$'
    ]));
}
/**
 * [
 *    '6677',
 *    '4456677',
 *    '+1 (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+1 (233) 445-66-77',
 *    '+1 (233) 445-66-77',
 *    '+ (233) 445-66-77',
 *    '+1 (233) 445-66-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::format($phone, Phone::FORMAT_DEFAULT, false));
}
echo PHP_EOL;

// Example: hide
/**
 * [
 *    '***-**-77',
 *    '***-**-77',
 *    '+1 (233) ***-**-77',
 *    '(233) ***-**-77',
 *    '(233) ***-**-77',
 *    '(233) ***-**-77',
 *    '(233) ***-**-77',
 *    '(233) ***-**-77',
 *    '(233) ***-**-77',
 *    '+1 (233) ***-**-77',
 *    '+1 (233) ***-**-77',
 *    '(233) ***-**-77',
 *    '+1 (233) ***-**-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::hide($phone));
}
/**
 * [
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 *    '8-*** ***-**-77',
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::hide($phone, '8-*** ***-**-$6'));
}
echo PHP_EOL;

// Example: extract
/**
 * [
 *     null,
 *     '4456677',
 *     '12334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '12334456677',
 *     '12334456677',
 *     '2334456677',
 *     '12334456677'
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::extract($phone));
}
/**
 * [
 *     null,
 *     null,
 *     '12334456677',
 *     null,
 *     null,
 *     null,
 *     null,
 *     null,
 *     null,
 *     '12334456677',
 *     '12334456677',
 *     null,
 *     '12334456677'
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::extract($phone, 11));
}
/**
 * [
 *     null,
 *     '4456677',
 *     null,
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     '2334456677',
 *     null,
 *     null,
 *     '2334456677',
 *     null
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::extract($phone, Phone::SIZE_MIN, 10));
}
echo PHP_EOL;

// Example: exist
/**
 * [
 *     false,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::exist($phone));
}
/**
 * [
 *     false,
 *     false,
 *     true,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     true,
 *     true,
 *     false,
 *     true
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::exist($phone, 11));
}
/**
 * [
 *     false,
 *     true,
 *     false,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     false,
 *     false,
 *     true,
 *     false
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::exist($phone, Phone::SIZE_MIN, 10));
}
echo PHP_EOL;

// Example: is
/**
 * [
 *     false,
 *     true,
 *     false,
 *     true,
 *     false,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     true,
 *     false,
 *     false
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::is($phone));
}
/**
 * [
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     true,
 *     true,
 *     false,
 *     false
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::is($phone, 11));
}
/**
 * [
 *     false,
 *     true,
 *     false,
 *     false,
 *     false,
 *     true,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false,
 *     false
 * ]
 */
foreach($numbers as $phone) {
    var_dump(Phone::is($phone, Phone::SIZE_MIN, 10));
}
echo PHP_EOL;