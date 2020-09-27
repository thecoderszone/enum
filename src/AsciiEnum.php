<?php
/*
 * Copyright Paul Adams, 2020. All rights reserved.
 * Unauthorized reproduction is prohibited.
 *
 * @package Enum
 * @author Paul Adams <paul@thecoderszone.com>
 */

namespace TCZ\Enum;

/**
 * Enums that use their label as their value.
 *
 * @package Dashboard\Enums
 */
trait AsciiEnum
{
    /**
     * Get the enum labels.
     *
     * @return array
     */
    public static function getLabels()
    {
        return static::getValues();
    }
}
