<?php

namespace TCZ\Enum\Tests;

use PHPUnit\Framework\TestCase;
use TCZ\Enum\Tests\Mocks\AsciiLanguage;

class AsciiEnumTest extends TestCase
{
    public function test_get_labels()
    {
        $this->assertEquals(AsciiLanguage::getValues(), AsciiLanguage::getLabels());
    }
}
