<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArticleCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $categories = \App\Models\ArticleCategory::factory()->count(10)->create();
        $response = $this->get(route('article_categories.index'));
        $response->assertStatus(200);
        $response->assertSeeText($categories[0]->name);
        $response->assertSeeText($categories[3]->name);
    }
}
