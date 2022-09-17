<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Article;

class ArticleControllerTest extends TestCase
{
    public function testShow()
    {
        $article = Article::factory()->create();
        $response = $this->get(route('articles.show', $article));
        $response->assertStatus(200);
    }
}
