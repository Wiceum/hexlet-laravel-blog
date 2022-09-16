<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rate()
    {
        $arts = Article::all()
            ->filter(fn($art) => $art->isPublished())
            ->sort(
                fn($a, $b) => $b->likes_count <=> $a->likes_count
            );
        return view('rating.index', ['arts' => $arts]);
    }
}
