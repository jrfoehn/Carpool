<html>
	<head>
		<title>Bienvenue sur le site de covoiturage !</title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Bienvenue sur le site de covoiturage!</div>
				<div class="quote">under construction, coming soon</div>
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/index.php/home') }}">Entrer dans le site</a></li>
				</ul>
			</div>
		</div>
	</body>
</html>
