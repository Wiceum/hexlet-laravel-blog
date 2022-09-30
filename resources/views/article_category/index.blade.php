@extends('layouts.app')

@section('head', 'Категории статей')

{{ session('update') }}

@section('content')

    <a href="{{ route('article_categories.create') }}">Create</a>

    @if (session()->has('success'))
        <p style="">{{ session('success')}}</p>
    @endif

    <h1>Список категорий статей</h1>
    @foreach($articleCategories as $category)
        <h2><a href="{{ route('article_categories.show', $category) }}">{{$category->name}}</a></h2>
        <div>{{$category->description}}</div>
        <small>
            <a href="{{ route('article_categories.edit', ['id' => $category->id]) }}">
                Edit
            </a>
        </small>
    @endforeach
@endsection
