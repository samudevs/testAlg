<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
	<title>Users Management</title>
</head>
<body>
	<header>
		<a href="{{ route('users.index') }}">View Users</a>
		<a href="{{ route('stats') }}">Stats</a>
		<a href="https://github.com/samudevs/testAlg">Source</a>
	</header>
	<main>
@yield('content')
	</main>
<footer>
	<h3>Created by Samuel López</h3>
</footer>

</body>
</html>