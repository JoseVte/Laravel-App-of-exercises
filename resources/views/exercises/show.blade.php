@extends('layouts.master')

@section('title', '{{$exercise->name}}')

@section('sidebar')
	<a href="{{route('exercises.index')}}">Exercises</a> / {{$exercise->name}}
@endsection

@section('content')
	{{$exercise->description}}
@endsection