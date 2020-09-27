<?php

namespace TCZ\Enum\Tests;

use PHPUnit\Framework\TestCase;
use TCZ\Enum\Tests\Mocks\Java;
use TCZ\Enum\Tests\Mocks\Language;

class EnumerableTest extends TestCase
{
    public function test_get_values()
    {
        $values = Language::getValues();
        
        $this->assertEquals([
            'PYTHON' => 1,
            'JAVASCRIPT' => 2,
            'GO' => 3,
            'RUST' => 4,
            'RUBY' => 5,
            'C' => 6,
            'CPP' => 7,
            'CSHARP' => 8,
            'JAVA' => 9,
            'PHP' => 10,
        ], $values);
    }
    
    public function test_get_value_works()
    {
        $this->assertEquals(Language::CPP, Language::getValue('C++'));
        $this->assertEquals(Language::PYTHON, Language::getValue('PYTHON'));
        $this->assertNull(Language::getValue('???'));
    }
    
    public function test_get_labels()
    {
        $this->assertEquals(Language::$labels, Language::getLabels());
    }
    
    public function test_get_label()
    {
        $this->assertEquals('JAVASCRIPT', Language::getLabel(Language::JAVASCRIPT));
        $this->assertEquals('🐘', Language::getLabel(Language::PHP));
        $this->assertNull(Language::getLabel('trick question'));
    }
    
    public function test_is_valid_ensures_things_are_valid()
    {
        $this->assertTrue(Language::isValid(Language::GO));
        $this->assertTrue(Language::isValid(7));
        $this->assertFalse(Language::isValid(-1));
    }
    
    public function test_get_classes_gets_the_classes()
    {
        $this->assertEquals(Language::$classes, Language::getClasses());
    }
    
    public function test_get_class_gets_one_class()
    {
        $this->assertEquals(Java::class, Language::getClass(Language::JAVA));
        $this->assertNull(Language::getClass(Language::C)); // no classes in C
    }
    
    public function test_create_obj()
    {
        $java = Language::create(Language::JAVA, $foo = 'bar');
        $this->assertInstanceOf(Java::class, $java);
        $this->assertEquals($foo, $java->foo);
        $this->assertNull(Language::create(Language::RUST));
    }
    
    public function test_serialize_class()
    {
        $this->assertEquals(Language::JAVA, Language::serialize(Java::class));
        $this->assertNull(Language::serialize(\stdClass::class));
    }
    
    public function test_fancy_stuff()
    {
        $this->assertEquals(Language::RUBY, Language::getValue(Language::getLabel(Language::RUBY)));
    }
}
