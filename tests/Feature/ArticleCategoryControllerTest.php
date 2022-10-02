<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{Article, ArticleCategory};

class ArticleCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        Article::factory()->count(10)->create();
        $response = $this->get(route('article_categories.index'));
        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $category = ArticleCategory::factory()->create();
        $response = $this->delete(route('article_categories.destroy', $category));
        $response->assertStatus(302);

        $category2 = ArticleCategory::find($category->id);
        $this->assertNull($category2);
    }
}
