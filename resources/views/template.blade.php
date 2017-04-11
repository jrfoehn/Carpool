@extends('app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Fonts -->
		<title>Covoiturage</title>
		<style> textarea { resize: none; } </style>
	</head>
	<body>
		@yield('contenu')
	</body>
</html>
@endsection