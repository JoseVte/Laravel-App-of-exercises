@extends('layouts.master')

@section('sidebar')
<h1>Login</h1>
@endsection

@section('content')
{!! Form::open(array('route' => 'post.login', 'class' => 'form')) !!}

<!-- print errors -->
@foreach($errors->all() as $error)
<div>{{$error}}</div>
@endforeach

<div class="form-group">
	{!! Form::label('email', 'Email: ') !!}
	{!! Form::email('email',null,array('required', 'class'=>'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Password: ') !!}
	{!! Form::password('password',array('required', 'class'=>'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::submit('Login',array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@stop