<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\ArticleCategory::orderBy('id', 'desc')->get();
        return view('article_category.index', ['articleCategories' => $categories]);
    }

    public function show($id)
    {
        $category = \App\Models\ArticleCategory::findOrFail($id);
        return view('article_category.show', compact('category'));
    }

    public function create()
    {
        $category = new ArticleCategory();
        return view('article_category.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|min:200',
            'state' => ['required', function ($attr, $value, $fail) {
                if (!($value === 'draft' || $value === 'published')) {
                    $fail('Invalid state!');
                }
            }]
        ]);

        $articleCategory = new ArticleCategory();
        $articleCategory->fill($data);
        $articleCategory->save();

        $request->session()->flash('success', 'Category was added!');

        return redirect()
            ->route('article_categories.index');
    }

    public function edit($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return view('article_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|min:200',
            'state' => ['required', function ($attr, $value, $fail) {
                if (!($value === 'draft' || $value === 'published')) {
                    $fail('Invalid state!');
                }
            }]
        ]);

        $category->fill($data);
        $category->save();

        $request->session()->flash('update', 'Category was updated!');

        return redirect()->route('article_categories.index');
    }

    public function destroy($id)
    {
        $category = ArticleCategory::find($id);
        if ($category) {
            $category->delete();
            session()->flash('destroy', 'Category was deleted!');
        }
        return redirect()->route('article_categories.index');
    }
}
