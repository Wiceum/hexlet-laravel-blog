<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('<a href="/about">', false);
        $response->assertSee('<a href="/articles">', false);
    }

    public function testAbout()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('<h1>О блоге</h1>', false);
        $response->assertSee('<p>Эксперименты с Ларавелем на Хекслете</p>', false);
    }

    public function testArticles()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);
        $response->assertSee('<h1>Статьи</h1>', false);
    }
}
