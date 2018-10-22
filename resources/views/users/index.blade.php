@extends('layout')

@section('content')
<form method="POST" action="{{route('search')}}">
	{!! csrf_field() !!}
	<h2>Find user</h2>
	<label>
		Name
		<input type="text" name="name">
	</label>
	<label>
		<input type="submit" value="find">
	</label>
</form> 
<form method="POST" action="{{route('users.store')}}">
	{!! csrf_field() !!}
	<h2>Add user</h2>
	<label>
		Name
		<input type="text" name="name">
	</label>
	<label>
		<input type="submit" value="add">
	</label>
</form>
<h1>All users</h1>

@foreach ($users as $user)
<div class="user">
	<p>{{ $user->name }}</p>
	<ul>

	 @foreach ($user->relations as $relation)
	 		<li><a href="{{route('users.show',$relation->id)}}">{{$relation->name}}</a></li>
	 @endforeach

	</ul>
	@include('users.form')
</div>
@endforeach


@stop