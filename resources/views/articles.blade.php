@extends('layouts.app')

@section('header', 'Статьи')

@section('content')
    @foreach($articles as $art)
        <h2>{{$art->name}}</h2>
        <p>{{$art->body}}</p>
    @endforeach
@endsection
