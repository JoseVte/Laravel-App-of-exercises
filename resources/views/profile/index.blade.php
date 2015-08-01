@extends('layouts.master')
 
@section('title', 'Profile')

@section('sidebar')
<h2>Profile</h2>
@endsection

@section('content')
<section class="col-md-9">
    <p>Name: {{ $userdata->name }}</p>
    <p>Email: {{ $userdata->email }}</p>
    <p>Number of exercises: {{ $userdata->exercises()->count() }}</p>
</section>
@stop