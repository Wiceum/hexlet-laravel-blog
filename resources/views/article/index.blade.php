@extends('layouts.app')

@section('content')
    {{ session('update') }}

    {{ Form::open(['route' => 'articles.index', 'method' => 'GET']) }}
        {{ Form::text('q', $q ?? '') }}
        {{ Form::submit('find') }}
    {{ Form::close() }}

    <hr>
    <a href="{{ route('articles.create') }}">Create</a>
    <hr>

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{ $article->id }}. <a
                href="{{ route('articles.show', ['id' => $article->id]) }}">
                {{$article->name}} </a>
        </h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <small><a href="{{ route('articles.edit',
                [
                    'id' => $article->id,
                    'categories' => \App\Models\ArticleCategory::get()
                ]) }}">
                Edit</a></small>
    @endforeach
    {{-- $articles->links() --}}

@endsection


