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
*     4400,
*     0064400,
*     79110064400,
*     1112223333,
*     1112223333,
*     1112223333,
*     1112223333,
*     1112223333,
*     1112223333,
*     11234567890,
*     18002353551,
*     1234567890,
*     11234567890
* ]
*/
```

## License

See the [LICENSE.md](https://github.com/cs-eliseev/helpers-phone/blob/master/LICENSE.md) file for licensing details.