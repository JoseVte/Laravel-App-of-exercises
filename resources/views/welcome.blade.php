@extends('layouts.master')

@section('title', 'Home')

@section('sidebar')
<h1>Home</h1>
@endsection

@section('content')
    <p>{!! link_to_route('exercises.index', 'Go to all exercises') !!}</p>
    @if(!Auth::guest())
        @if (Auth::user()->exercises()->count() == 0)
        There's not exercises.
        <p>{!! link_to_route('exercises.create', 'Create new exercise') !!}</p>
        @else
        <p>{!! link_to_route('exercises.index', 'Go to yours exercises') !!}</p>
        @endif
    @else
    @endif
@stop