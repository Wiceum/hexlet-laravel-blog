@extends('layouts.app')

@section('title', 'О блоге')

@section('content')
    <h1>О блоге</h1>
    <p>Эксперименты с Ларавелем на Хекслете</p>
    <!-- BEGIN (write your solution here) -->
    @foreach($team as $unit)
        <div>Name: {{$unit['name']}}
            <p>
                Role: {{$unit['position']}}
            </p>
        </div>
    @endforeach
@endsection
    <!-- END -->

