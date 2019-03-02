PHONE CSE HELPERS
=======

The helpers allows you manipulating, extract, detecting PHONE.

Project repository: https://github.com/cs-eliseev/helpers-phone

***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. PHONE CSE HELPERS for manipulating, extract and detecting phone.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers projec:**
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-phone).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-phone
```

Or file composer.json should include the following contents:
```
{
    "require": {
        "cse/helpers-phone": "*"
    }
}
```

### Git

Clone this repository locally:
```shell
git clone https://github.com/cs-eliseev/helpers-phone.git
```

### Download

[Download the latest release here](https://github.com/cs-eliseev/helpers-phone/archive/master.zip).

## Usage

The class consists of static methods that are conveniently used in any project. See example [examples-phone.php](https://github.com/cs-eliseev/helpers-phone/blob/master/examples/examples-phone.php).

Example data:
```php
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
```

**CLEAR phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::clear($phone);
}
/**
* [
*     '6677',
*     '4456677',
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
```

**FORMAT phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::format($phone);
}
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
```

Not use mask:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::format($phone, Phone::FORMAT_DEFAULT, false);
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
```

Change format phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::format($phone, '$3-$4-$5');
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
```

Change pattern format phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::format($phone, '$1-$2-$3-$4-$5', true, '(.{2})(.{2})(.{2})(.{4})(.*)');
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
```

Change revert format phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::format($phone, '$1 $2 $3 $4-$5-$6', true,'(.{2})(.{2})(.{2})(.{2})(.{2})(.*)', [
        '$6' => '1$',
        '$5' => '2$',
        '$4' => '3$',
        '$3' => '4$',
        '$2' => '5$',
        '$1' => '6$'
    ]);
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
```

**HIDE phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::hide($phone);
}
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
```

Change format hide phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::hide($phone, '8-*** ***-**-$6');
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
```


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-phone/blob/master/LICENSE.md) file for licensing details.