@extends('layout')

@section('content')
<h1>{{ $user->name }}</h1>
<ul class="user">

 @foreach ($user->relations as $relation)
 		<li><a href="{{route('users.show',$relation->id)}}">{{$relation->name}}</a></li>
 @endforeach

</ul>
@include('users.form')
@stop
