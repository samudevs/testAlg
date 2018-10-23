@extends('layout')

@section('content')
<h1>Relation stats</h1>
<dl>
	<dt>Total Relations</dt><dd> {{ $stats['count'] }}</dd>
	<dt>Avg Relations:</dt><dd>{{ $stats['avg']}}</dd>
	<dt>Max Relations:</dt><dd>{{ $stats['max'][0]}}</dd><span>with {{$stats['max'][1]}}</span>
	<dt>Min Relations:</dt><dd>{{ $stats['min'][0]}}</dd><span>with {{$stats['min'][1]}}</span>
	<dt>Most occurrence:</dt><dd>{{ $stats['most']}}</dd>
</dl>
@stop
