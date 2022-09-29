<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = '';
        $q = $request->input('q') ?? '';

        if ($q == '') {
            $articles = Article::all();
            return view('article.index', compact('articles'));
        } else {
            dump($q);
            $articles = Article::where('name', 'like', "%{$q}%")->get();
            return view(
                'article.index',
                [
                    'articles' => $articles,
                    'q' => $q
                ]
            );
        }
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        // Передаём в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        $categories = ArticleCategory::all();
        return view('article.create', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // Проверка введённых данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'category_id' => 'required'
        ]);

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($data);
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index');
    }
}
