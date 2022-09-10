<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSeeText('Articles');
        $response->assertSeeText('О блоге');
    }

    public function testArticles()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSeeText('About');
        $response->assertSeeText('Статьи');
    }
}
