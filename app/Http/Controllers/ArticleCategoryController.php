<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $cats = \App\Models\ArticleCategory::orderBy('id', 'desc')->paginate(20);
        return view('article_category.index', ['cats' => $cats]);
    }
}
