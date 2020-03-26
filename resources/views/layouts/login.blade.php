<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingresar al sistema</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		body {
			background: linear-gradient(#FFBF00, #FF8000);
			height: 100vh;
		}
		footer {
			bottom: 0;
			position: absolute;
			color: orange;
			text-shadow: 1px 1px 1px #000;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5"></div>
			<div class="col-md-12 mt-5"></div>
			<div class="col-md-12 mt-5 text-center">
				<img src="{{ asset('imgs/asisttec-logov4.png') }}" alt="">
			</div>
		</div>
	</div>
	@yield('content')

<footer>
	<p>Desarrollado por Angel Oyarzun &copy; 2019</p>
</footer>
</body>
</html>