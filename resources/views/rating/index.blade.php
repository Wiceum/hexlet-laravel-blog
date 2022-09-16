@extends('layouts.app')

@section('header', 'Рейтинг статей')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Лайки</td>
            <td>Статья</td>
        </tr>
        </thead>
        <tbody>
        @foreach($arts as $art)
            <tr>
                <td>{{$art->likes_count}}</td>
                <td>{{$art->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
