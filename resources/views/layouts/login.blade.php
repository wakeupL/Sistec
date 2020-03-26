<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingresar al sistema</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		body {
			background: linear-gradient(#FF8000 ,#FFBF00, #FF8000);
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
	@if (Route::has('login'))
	<div class="container">
		@auth
		<div class="row text-center mt-5">
			<div class="col-md-12 mt-5">
				<span class="alert alert-success">Estás logueado, serás redirigido en breve!</span>
			</div>
		</div>
			<script type="text/javascript">
				 window.location="/dashboard";
			</script>
	</div>
		@else
	@yield('content')
		@endauth
	@endif
<footer>
	<p>Desarrollado por Angel Oyarzun &copy; 2019</p>
</footer>
</body>
</html>