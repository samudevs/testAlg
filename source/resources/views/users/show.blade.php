@extends('layout')

@section('content')
<h1>{{ $user->name }}</h1>
<ul>

 @foreach ($user->relations as $relation)
 		<li>{{$relation->name}}</li>
 @endforeach

</ul>
@include('users.form')

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
