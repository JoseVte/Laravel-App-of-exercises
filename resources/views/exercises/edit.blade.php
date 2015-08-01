@extends('layouts.master')

@section('title', 'Edit {{$exercise->name}}')

@section('sidebar')
	<h2>Create {{$exercise->name}}</h2>
@endsection

@section('content')
	{!! Form::model($exercise, ['method' => 'PATCH' ,'route' => ['exercises.update', $exercise->slug]]) !!}
		@include('exercises/partials/_form', ['submit_text' => 'Edit exercise'])
	{!! Form::close() !!}
@endsection