PHONE CSE HELPERS
=======

The helpers allows you manipulating, extract, detecting PHONE.

Project repository: https://github.com/cs-eliseev/helpers-phone

```php
switch (true) {
    case Phone::is($phone):
        break;
    case Phone::exist($phone):
        $phone = Phone::extract($phone);
        break;
    default:
        new Exception('Phone is not exist');
}

$phone = Phone::format($phone);
```
***

## Introduction

CSE HELPERS is a collection of several libraries with simple functions written in PHP for people.

Despite using PHP as the main programming language for the Internet, its functions are not enough. PHONE CSE HELPERS for manipulating, extract and detecting phone.

CSE HELPERS was created for the rapid development of web applications.

**CSE Helpers project:**
* [Array CSE helpers](https://github.com/cs-eliseev/helpers-arrays)
* [Cookie CSE helpers](https://github.com/cs-eliseev/helpers-cookie)
* [Date CSE helpers](https://github.com/cs-eliseev/helpers-date)
* [Email CSE helpers](https://github.com/cs-eliseev/helpers-email)
* [IP CSE helpers](https://github.com/cs-eliseev/helpers-ip)
* [Json CSE helpers](https://github.com/cs-eliseev/helpers-json)
* [Math Converter CSE helpers](https://github.com/cs-eliseev/helpers-math-converter)
* [Phone CSE helpers](https://github.com/cs-eliseev/helpers-phone)
* [Request CSE helpers](https://github.com/cs-eliseev/helpers-request)
* [Session CSE helpers](https://github.com/cs-eliseev/helpers-session)
* [Word CSE helpers](https://github.com/cs-eliseev/helpers-word)

Below you will find some information on how to init library and perform common commands.

## Install

You can find the most recent version of this project [here](https://github.com/cs-eliseev/helpers-phone).

### Composer

Execute the following command to get the latest version of the package:
```shell
composer require cse/helpers-phone
```

Or file composer.json should include the following contents:
```json
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

**EXTRACT phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::extract($phone);
}
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
```

Change check min size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::extract($phone, 11);
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
```

Change check max size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::extract($phone, Phone::SIZE_MIN, 10);
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
```

**EXIST phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::exist($phone);
}
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
```

Change check min size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::exist($phone, 11);
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
```

Change check max size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::exist($phone, Phone::SIZE_MIN, 10);
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
```

**IS phone number**

Example:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::is($phone);
}
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
```

Change check min size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::is($phone, 11);
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
```

Change check max size phone number:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones = Phone::is($phone, Phone::SIZE_MIN, 10);
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
```


## Testing & Code Coverage

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

To run the PHPUnit unit tests, execute:
```shell
phpunit PATH/TO/PROJECT/tests/
```

If you want code coverage reports, use the following:
```shell
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Used PHPUnit default config:
```shell
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-phone/blob/master/LICENSE.md) file for licensing details.