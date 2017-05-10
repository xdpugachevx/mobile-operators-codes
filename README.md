# Mobile Operators Codes

Библиотека для определения мобильного оператора и региона по номеру телефона.
Используется список кодов мобильных операторов РФ, взятый с сайта [Россвязь](https://www.rossvyaz.ru/activity/num_resurs/registerNum/).

## Установка с использованием composer

```bash
composer require "xdpx/mobile-operators-codes"
```

## Использование

```php
$reader = new \MobileOperatorsCodes\Reader();
$record = $reader->findRecord('+79991234567');
$record = $reader->findRecord('89991234567');
$record = $reader->findRecord('(999) 123-45-67');
$record = $reader->findRecord('9991234567');

echo $record->operator();
```

## Обработка ошибок

Если передан телефон в неверном формате, то будет выброшено исключение `\MobileOperatorsCodes\WrongPhoneNumberFormatException`.

Если запись о номере телефона не найдена в БД, то будет выброшено исключение `\MobileOperatorsCodes\RecordNotFoundException`.
