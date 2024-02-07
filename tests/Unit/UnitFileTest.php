<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Comment;
use App\Actions\Unit;

class UnitFileTest extends TestCase
{
    protected $emptyParameter = [];
    public function test_some_assert_unit_test_function()
    {
        $this->assertEquals(1, 1);
        $this->assertEquals('test', 'test');
        $this->assertArrayHasKey('first', ['first' => 'test']);
        $this->assertContains(3, [1, 2, 3]);
        $this->assertContains('test', ['laravel', 'uint', 'test']);
        $this->assertContainsOnly('string', ['1', '2', '3']);
        $this->assertCount(2, ['unit', 'test']);
        $this->assertEmpty($this->emptyParameter);
    }
    private function commentSample()
    {
        return new Comment([
            'user_id' => 1,
            'post_id' => 1,
            'parent_id' => null,
            'child' => false,
            'title' => 'test',
            'text' => 'unit test',
        ]);
    }
    public function test_comment_create()
    {
        $this->assertNotEmpty($this->commentSample());
    }
    public function test_comment_have_user()
    {
        $this->assertArrayHasKey('user_id', $this->commentSample());
    }
    public function test_comment_count()
    {
        $this->assertCount(1, array($this->commentSample()));
    }
    public function test_convertor_unit()
    {
        $testNumber = new Unit(10);
        $this->assertEquals(1000, $testNumber->convert_meter_to_centimeter());
        $this->assertEquals(10000, $testNumber->convert_meter_to_millimeter());
        $this->assertEquals(393.7, $testNumber->convert_meter_to_inch());
        $this->assertContains(10, array($testNumber->number));
        $this->assertContainsOnly('integer', array($testNumber->number));
    }
}
