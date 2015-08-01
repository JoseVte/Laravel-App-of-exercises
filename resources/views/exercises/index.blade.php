@extends('layouts.master')

@section('title', 'Exercises')

@section('sidebar')
<h2>Index of exercises</h2>
@endsection

@section('content')
@if (!$exercises->count())
There's not exercises
@else
<ul>
	@foreach($exercises as $exercise)
	<li>
		{!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('exercises.destroy', $exercise->slug))) !!}
		<a href="{{route('exercises.show',$exercise->slug)}}">{{$exercise->name}}</a>
		{!! link_to_route('exercises.edit', 'Edit', array($exercise->slug), array('class' => 'btn btn-info')) !!},
		{!! Form::submit('Delete', array('class' => 'btn btn-danger' )) !!}
		{!! Form::close() !!}
	</li>
	@endforeach
</ul>
@endif

<p>
	{!! link_to_route('exercises.create', 'Create new exercise') !!}
</p>
@endsection