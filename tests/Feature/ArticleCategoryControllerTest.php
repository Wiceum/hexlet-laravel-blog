<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{Article, ArticleCategory};


class ArticleCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $category = ArticleCategory::factory()->create();
        $response = $this->get(route('article_categories.show', $category));
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $article = Article::factory()->create();
        $response = $this->get(route('article_categories.show', $article->category));
        $response->assertStatus(200);
        $response->assertSeeText($article->name);
        $response->assertSeeText($article->category->name);
        $response->assertSee('<ol>', false);
    }

    public function testShowWithoutArticles()
    {
        $category = ArticleCategory::factory()->create();
        $response = $this->get(route('article_categories.show', $category));
        $response->assertStatus(200);
        $response->assertDontSee('<ol>', false);
    }
}
