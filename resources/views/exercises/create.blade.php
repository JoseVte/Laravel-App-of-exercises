@extends('layouts.master')

@section('title', 'Create exercise')

@section('sidebar')
	<h2>Create exercise</h2>
@endsection

@section('content')
	{!! Form::model(new App\Exercise, ['route' => ['exercises.store']]) !!}
		@include('exercises/partials/_form', ['submit_text' => 'Create exercise'])
	{!! Form::close() !!}
@endsection