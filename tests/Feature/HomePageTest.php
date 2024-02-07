<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_route_have_not_about()
    {
        $response = $this->get('/about');
        $response->assertNotFound();
    }
    public function test_request_for_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_see_word_in_index()
    {
        $response = $this->get('/');
        $response->assertSee('SwaggerUI');
    }
    public function test_do_not_see_word_in_index()
    {
        $response = $this->get('/');
        $response->assertDontSee('Laravel');
    }
    public function test_see_text_in_index()
    {
        $response = $this->get('/');
        $response->assertSeeText('http://localhost/swagger/api.yaml');
    }
}
