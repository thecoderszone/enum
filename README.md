# Enum

A functional enum type for PHP.

## Installation
```
composer require thecoderszone/enum
```

### Usage
- Create an enum by extending `Enumerable`.
- Define constants on your `Enumerable` and assign values to them. The values themselves are not important as long as they don't change.
- Optionally, add custom labels using the `$labels` array and map your enum values to native classes using the `$classes` array.
```php
<?php

use TCZ\Enum\Enumerable;
// use TCZ\Enum\AsciiEnum;
use Animals\Cat;
use Animals\Dog;
use Animals\Kangaroo;

class Pet extends Enumerable
{
    // AsciiEnum defaults labels to values, ideal for text based use cases.
    // N.B. Pet::getLabels() would return Pet::getValues(), as opposed to the $labels array.
    // use AsciiEnum;

    public const CAT = 1;

    public const DOG = 2;
    
    public const KANGAROO = 3;

    public static $labels = [
        self::CAT => '🐈',
        self::DOG => '🦮',
        self::KANGAROO => '🦘',
    ];

    public static $classes = [
        self::CAT => Cat::class,
        self::DOG => Dog::class,
        self::KANGAROO => Kangaroo::class,
    ];
}
```
`Enumerable` types include functions for translating between values, labels and native objects.  

```php
Pet::getLabel(Pet::CAT); // => 🐈 Get the label for a value`
```
```php
Pet::getValue('🦮'); // => 2 Get the value for a label
```
```php
Pet::getClass(Pet::KANGAROO); // => 'Animal\Kangaroo' Get the class for a value
``` 
```php
Pet::create(Pet::DOG, $breed = 'labrador'); // => Dog([breed] => 'labrador') Create an object for a value, supplying any remaining parameters to the constructor.
``` 
```php
Pet::isValid(1); // => true Determine if a value is valid
```
```php
Pet::serialize(Dog::class); // => 2 Get the value for a class
``` 
```php
Pet::getValues(); // => [1, 2, 3] Get possible values
```
```php
Pet::getLabels(); // => [1 => '🐈', 2 => '🦮', 3 => '🦘'] Get possible labels
```
```php
Pet::getClasses(); // => [1 => 'Animal\Cat', 2 => 'Animal\Dog', 3 => 'Animal\Kangaroo'] Get possible classes
```
