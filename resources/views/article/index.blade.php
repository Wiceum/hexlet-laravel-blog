@extends('layouts.app')

@section('content')

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
    @endforeach
    {{-- $articles->links() --}}

@endsection


