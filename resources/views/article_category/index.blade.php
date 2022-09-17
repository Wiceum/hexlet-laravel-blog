@extends('layouts.app')

@section('head', 'Категории статей')

@section('content')
    <table>
        <thead>
        <tr>
            <td>
                Название категории
            </td>
            <td>
                Описание категории
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($cats as $cat)
        <tr>
            <td>
                <a href="{{ route('article_categories.show', ['id' => $cat->id]) }}">
                    {{ $cat->name }}
                </a>
            </td>
            <td>
                {{ $cat->description }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
