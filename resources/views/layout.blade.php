<!DOCTYPE html>
<html>
<head>
	<title>Users Management</title>
</head>
<body>
	<header>
		<a href="{{ route('users.index') }}">View Users</a>
		<a href="{{ route('relations') }}">Relations</a>
	</header>
@yield('content')
<footer>
	<h3>Created by Samuel López</h3>
</footer>

</body>
</html>