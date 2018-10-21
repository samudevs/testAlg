	<form method="POST" action="{{ route('users.update', $user->id) }}">
	{!! method_field('PUT') !!}
	{!! csrf_field() !!}
	<select name="id">
		<option disabled selected value>Relate to</option>
		@foreach ($users as $user)
			<option value="{{$user->id}}">{{$user->name}}</option>
		@endforeach
	</select>
	<input type="submit" value="add">
</form>