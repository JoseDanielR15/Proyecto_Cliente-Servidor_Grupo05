<?php
$assets = "/infinitytech/Views/assets/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Iniciar Sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="<?= $assets ?>images/icons/favicon.png"/>

	<link rel="stylesheet" href="<?= $assets ?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $assets ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= $assets ?>fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?= $assets ?>fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="<?= $assets ?>vendor/animate/animate.css">
	<link rel="stylesheet" href="<?= $assets ?>vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" href="<?= $assets ?>vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" href="<?= $assets ?>vendor/select2/select2.min.css">
	<link rel="stylesheet" href="<?= $assets ?>vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="<?= $assets ?>css/util.css">
	<link rel="stylesheet" href="<?= $assets ?>css/main.css">
</head>

<body class="animsition">

	<!-- LOGIN -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr justify-content-center">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Iniciar Sesión
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
								type="email"
								name="email"
								placeholder="Correo electrónico">
							<img class="how-pos4 pointer-none"
								src="<?= $assets ?>images/icons/icon-email.png"
								alt="ICON">
						</div>

						<div class="bor8 m-b-30 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
								type="password"
								name="password"
								placeholder="Contraseña">
							
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Ingresar
						</button>

						<div class="txt-center p-t-20">
							<a href="../VRegistro/registro.php" class="stext-107 cl2 hov-cl1">
								¿No tienes cuenta? Regístrate
							</a>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>

	<!-- SCRIPTS -->
	<script src="<?= $assets ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= $assets ?>vendor/animsition/js/animsition.min.js"></script>
	<script src="<?= $assets ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?= $assets ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= $assets ?>vendor/select2/select2.min.js"></script>

	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
	</script>

	<script src="<?= $assets ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');

			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			});
		});
	</script>

	<script src="<?= $assets ?>js/main.js"></script>

</body>
</html>
