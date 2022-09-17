@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <a href="{{ route('article_categories.show', ['id' => $article->category_id]) }}">
        Категория: {{ $article->category }}
    </a>
    <div>{{$article->body}}</div>
@endsection
