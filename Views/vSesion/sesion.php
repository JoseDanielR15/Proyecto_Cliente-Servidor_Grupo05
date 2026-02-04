<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio de Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../assets/images/icons/favicon.png"/>

	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../assets/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>

<body class="animsition">

<!-- ================= HEADER ================= -->
<header class="header-v4">
	<div class="container-menu-desktop">
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					InfinityTech
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="../Vsesion/sesion.php" class="flex-c-m trans-04 p-lr-25">
						Inicio Sesión
					</a>
					<a href="../Vregistro/registro.php" class="flex-c-m trans-04 p-lr-25">
						Registrar
					</a>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop how-shadow1">
			<nav class="limiter-menu-desktop container">
				<a href="../Vinicio/inicio.php" class="logo">
					<img src="../assets/images/icons/logo-01.png" alt="InfinityTech">
				</a>

				<div class="menu-desktop">
					<ul class="main-menu">
						<li><a href="../Vinicio/inicio.php">Home</a></li>
						<li><a href="#">Shop</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>						
			</nav>
		</div>	
	</div>
</header>

<!-- ================= LOGIN FORM ================= -->
<form class="bg0 p-t-25 p-b-50">
	<div class="container">
		<div class="row justify-content-center align-items-center min-vh-100">
			<div class="col-12 col-md-8 col-lg-5">
				<div class="card border-0 shadow-none bg-transparent">
					<div class="card-body p-0">
						<div class="p-4 p-md-5">
							<h3 class="mb-4">Iniciar Sesión</h3>

							<div class="mb-3">
								<label class="form-label">Email</label>
								<input class="form-control" type="email" placeholder="correo@ejemplo.com">
							</div>

							<div class="mb-3">
								<label class="form-label">Password</label>
								<input class="form-control" type="password" placeholder="••••••••">
							</div>

							<button class="btn btn-primary w-100 mt-3">
								Iniciar Sesión
							</button>

							<p class="text-center mt-3">
								¿No tienes cuenta?
								<a href="../Vregistro/registro.php">Regístrate aquí</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- ================= FOOTER ================= -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<p class="stext-107 cl6 txt-center">
			Copyright &copy;<script>document.write(new Date().getFullYear());</script>
			InfinityTech. All rights reserved.
		</p>
	</div>
</footer>

<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<script src="../assets/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>
