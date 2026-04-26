<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversFunction;

#[CoversFunction('dd')]
#[CoversFunction('dump_to_string')]
#[CoversFunction('build_dsn')]
class FunctionsTest extends TestCase
{
    protected function setUp(): void 
    {
        require_once __DIR__ . '/../../functions.php';
    }
    public function test_dd_exists(): void
    {

        $this->assertTrue(function_exists('dd'));
    }

    public function test_dump_to_string(): void
    {

        $expectedResult = dump_to_string('Testing');

        $this->assertStringContainsString('Testing', $expectedResult);
        $this->assertStringContainsString('<pre>', $expectedResult);

    }

    public function test_build_dsn(): void 
    {
        $expectedResult = build_dsn('blog', 'blogDb');

        $this->assertEquals('mysql:host=blog;port=3306;dbname=blogDb;charset=utf8', $expectedResult);

    }

    public function test_dsn_exception(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        build_dsn('', 'meu_banco');
    }
} 