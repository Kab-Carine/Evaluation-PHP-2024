<?php

namespace App\Tests;



use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    public function testBAsicExample(): void
    {
        $a = 6;
        $b = 7;
        $result = $a + $b;
        $this->assertEquals(13, $result, 'test');
    }
}