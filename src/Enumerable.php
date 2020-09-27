<?php
/**
 * Copyright Paul Adams, 2020. All rights reserved.
 * Unauthorized reproduction is prohibited.
 *
 * @package Enum
 * @author Paul Adams <paul@thecoderszone.com>
 */

namespace TCZ\Enum;

use ReflectionClass;
use ReflectionException;

/**
 * Enumerable class.
 *
 * @package Dashboard\Enums
 */
class Enumerable
{
    /**
     * Native class mappings.
     *
     * @var array
     */
    protected static $classes = [];
    
    /**
     * The value labels.
     *
     * @var array
     */
    protected static $labels = [];
    
    /**
     * The constant cache.
     *
     * @var array
     */
    private static $cache;
    
    /**
     * Get the enum values.
     *
     * @return array
     */
    public static function getValues()
    {
        if (static::$cache) {
            return static::$cache;
        }
        
        try {
            return static::$cache = (new ReflectionClass(static::class))->getConstants();
        } catch (ReflectionException $exception) {
            return [];
        }
    }
    
    /**
     * Get a value by its label.
     *
     * @param string $label
     *
     * @return mixed
     */
    public static function getValue(string $label)
    {
        return array_search($label, static::getLabels()) ?: static::getValues()[$label] ?? null;
    }
    
    /**
     * Get the enum labels.
     *
     * @return array
     */
    public static function getLabels()
    {
        return static::$labels;
    }
    
    /**
     * Get the value label.
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function getLabel($value)
    {
        return static::getLabels()[$value] ?? array_search($value, static::getValues()) ?: null;
    }
    
    /**
     * Determine if a value is valid.
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, static::getValues());
    }
    
    /**
     * Get the enum classes.
     *
     * @return array
     */
    public static function getClasses()
    {
        return static::$classes;
    }
    
    /**
     * Get the class for a value.
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function getClass($value)
    {
        return static::getClasses()[$value] ?? null;
    }
    
    /**
     * Instantiate the class for a value.
     *
     * @param mixed $value
     * @param array $arguments
     *
     * @return object
     */
    public static function create($value, ...$arguments)
    {
        if ($class = static::getClass($value)) {
            return new $class(...$arguments);
        }
        
        return null;
    }
    
    /**
     * Get a value by its class.
     *
     * @param string $class
     *
     * @return int
     */
    public static function serialize(string $class)
    {
        return array_search($class, static::getClasses()) ?: null;
    }
}
