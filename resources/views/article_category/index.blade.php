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
                {{ $cat->name }}
            </td>
            <td>
                {{ $cat->description }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
