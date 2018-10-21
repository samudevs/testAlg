@extends('layout')

@section('content')
<form method="POST" action="{{route('search')}}">
	{!! csrf_field() !!}
	<label>
		Name
		<input type="text" name="name">
	</label>
	<label>
		<input type="submit" value="find">
	</label>
</form> 

<h1>All users</h1>
@foreach ($users as $user)
<p>{{ $user->name }}</p>
<ul>

 @foreach ($user->relations as $relation)
 		<li>{{$relation->name}}</li>
 @endforeach

</ul>
@include('users.form')

@endforeach

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
@stop