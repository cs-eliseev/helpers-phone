[English](https://github.com/cs-eliseev/helpers-phone/blob/master/README.md) | Русский

PHONE CSE HELPERS
=======

[![Travis (.org)](https://img.shields.io/travis/cs-eliseev/helpers-phone.svg?style=flat-square)](https://travis-ci.org/cs-eliseev/helpers-phone)
[![Codecov](https://img.shields.io/codecov/c/github/cs-eliseev/helpers-phone.svg?style=flat-square)](https://codecov.io/gh/cs-eliseev/helpers-phone)
[![Scrutinizer code quality](https://img.shields.io/scrutinizer/g/cs-eliseev/helpers-phone.svg?style=flat-square)](https://scrutinizer-ci.com/g/cs-eliseev/helpers-phone/?branch=master)

[![Packagist](https://img.shields.io/packagist/v/cse/helpers-phone.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-phone)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://packagist.org/packages/cse/helpers-phone)
[![Packagist](https://img.shields.io/packagist/l/cse/helpers-phone.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-phone/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/helpers-phone.svg?style=flat-square)](https://github.com/cs-eliseev/helpers-phone/archive/master.zip)

Данная библиотек состоит из статических методов, которые позволят вам легко обрабатывать, обнаруживать и получать телефонные номера. 

Репозиторий проекта: https://github.com/cs-eliseev/helpers-phone

**DEMO**
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


## Описание проекта

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) - это набор из небольших библиотек с простыми функциями написанных на PHP специально для вас.

Несмотря на повсеместное использование PHP в качестве основного языка для WEB разработки, его зачастую недостаточно. PHONE CSE HELPERS, предоставляет дополнительные статические методы, позволяющие вам более эффективно работать с телефонными номерами.

[CSE HELPERS](https://github.com/cs-eliseev/helpers/blob/master/README.ru_RU.md) создан для быстрой разработки веб-приложений.

**Список библиотек CSE Helpers:**
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

Ниже представлена информация об установке и перечне команд с примерами их использования.


## Установка

Самая последняя версия проекта доступна [здесь](https://github.com/cs-eliseev/helpers-phone).

### Composer

Чтобы установить последнюю версию проекта, выполните следующую команду в терминале:
```shell
composer require cse/helpers-phone
```

Или добавьте следующее содержимое в файл composer.json:
```json
{
    "require": {
        "cse/helpers-phone": "*"
    }
}
```

### Git

Добавить этот репозиторий локально можно следующим образом:
```shell
git clone https://github.com/cs-eliseev/helpers-phone.git
```

### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/helpers-phone/archive/master.zip).

## Использование

Данный класс использует статические методы, которые удобно использовать в любом проекте. Смотрите пример [examples-phone.php](https://github.com/cs-eliseev/helpers-phone/blob/master/examples/examples-phone.php).

Нобор данных использованный в примерах:
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

**Очистить телефонный номер от символов**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::clear($phone);
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

**Отформатировать телефонный номер**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::format($phone);
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

Не использовать маску:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::format($phone, Phone::FORMAT_DEFAULT, false);
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

Изменить формат телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::format($phone, '$3-$4-$5');
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

Изменить паттерн формата телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::format($phone, '$1-$2-$3-$4-$5', true, '(.{2})(.{2})(.{2})(.{4})(.*)');
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

Изменить группировку цифр в телефонном номере:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::format($phone, '$1 $2 $3 $4-$5-$6', true,'(.{2})(.{2})(.{2})(.{2})(.{2})(.*)', [
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

**Скрыть телефонный номер**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::hide($phone);
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

Изменить формат скрытия телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::hide($phone, '8-*** ***-**-$6');
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

**Проверка на телефонный номер**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::is($phone);
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

Изменить проверку разменера минимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::is($phone, 11);
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

Изменить проверку максимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::is($phone, Phone::SIZE_MIN, 10);
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

**Проверить существование телефонного номера**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::exist($phone);
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

Изменить проверку разменера минимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::exist($phone, 11);
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

Изменить проверку максимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::exist($phone, Phone::SIZE_MIN, 10);
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

**Получить телефонный номер**

Пример:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::extract($phone);
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

Изменить проверку разменера минимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::extract($phone, 11);
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

Изменить проверку максимальной длинны телефонного номера:
```php
$phones = [];
foreach($numbers as $phone)
{
    $phones[] = Phone::extract($phone, Phone::SIZE_MIN, 10);
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


## Тестирование и покрытие кода

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

Чтобы запустить тесты выполните:
```bash
phpunit PATH/TO/PROJECT/tests/
```

Чтобы сформировать отчет о покрытии тестами кода, необходимо выполнить следующую команду:
```bash
phpunit --coverage-html ./report PATH/TO/PROJECT/tests/
```

Чтобы использовать настройки по умолчанию, достаточно выполнить:
```bash
phpunit --configuration PATH/TO/PROJECT/phpunit.xml
```


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

PHONE CSE HELPERS это PHP-библиотека с открытым исходным кодом распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/helpers-phone/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)