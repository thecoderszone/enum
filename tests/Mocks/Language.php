<?php

namespace TCZ\Enum\Tests\Mocks;

use TCZ\Enum\Enumerable;

/**
 * Mock programming language enum for testing.
 */
class Language extends Enumerable
{
    public const PYTHON = 1;
    
    public const JAVASCRIPT = 2;
    
    public const GO = 3;
    
    public const RUST = 4;
    
    public const RUBY = 5;
    
    public const C = 6;
    
    public const CPP = 7;
    
    public const CSHARP = 8;
    
    public const JAVA = 9;
    
    public const PHP = 10;
    
    // HTML
    
    public static $labels = [
        self::CPP => 'C++',
        self::CSHARP => 'C#',
        self::PHP => '🐘',
    ];
    
    public static $classes = [
        self::JAVA => Java::class
    ];
}
