@extends('layouts.app')


@section('content')
    <h1>{{ $category->name }}</h1>
    <h4>{{ $category->description }}</h4>
    @if(!$category->articles->isEmpty())
        <ol>
            @foreach($category->articles as $art)
                <li>
                <a href="{{ route('articles.show', ['id' => $art->id]) }}">{{ $art->name }}</a>
                </li>
            @endforeach
        </ol>
    @endif
@endsection
