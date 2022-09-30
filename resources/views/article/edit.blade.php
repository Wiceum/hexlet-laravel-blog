@extends('layouts.app')

@section('content')
{{
    Form::model($article,
    ['route' => ['articles.update', $article], 'method' => 'PATCH' ])
}}
    @include('article.form', ['categories' => \App\Models\ArticleCategory::all()])
    {{ Form::submit('Сохранить') }}
    <p>{{ $article->category()->first()->id }} {{ $article->category()->first() }}</p>
{{ Form::close() }}
@endsection
