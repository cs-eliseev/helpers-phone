<?php

require_once __DIR__ . '/../autoload.php';

use cse\helpers\Phone;

$numbers = [
    4400,
    0064400,
    '+7 911 00 644 00',
    '(111) 222-3333',
    '((111) 222-3333',
    1112223333,
    '111 222-3333',
    '111-222-3333',
    '(111)2223333',
    '+112345678-90',
    '1-8002353551',
    '123-456-7890   -Hello!',
    '+1 - 1234567890'
];

foreach($numbers as $phone)
{
    var_dump(Phone::clear($phone));
}