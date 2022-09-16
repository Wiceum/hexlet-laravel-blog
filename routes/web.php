<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles', function () {
    $articles = \App\Models\Article::all();
    return view('articles', ['articles' => $articles]);
});

Route::get('about', [PageController::class, 'about']);

Route::get('rating', [RatingController::class, 'rate']);
