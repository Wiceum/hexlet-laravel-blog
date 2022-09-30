@extends('layouts.app')

@section('content')
{{ Form::model($category, ['route' => 'article_categories.store']) }}
    @include('article_category.form')
    {{ Form::submit('Создать') }}
{{ Form::close() }}
@endsection
