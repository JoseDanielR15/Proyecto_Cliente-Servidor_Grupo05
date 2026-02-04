<!DOCTYPE html>
<html lang="en">
<head>
	<title>InfinityTech</title>
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
<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						InfinityTech
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="../Vsesion/sesion.php" class="flex-c-m trans-04 p-lr-25">
							Inicio Sesion
						</a>

						<a href="../Vregistro/registro.php" class="flex-c-m trans-04 p-lr-25">
							Registrar
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Temporal
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Temporal
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->							
						<img src="../assets/images/icons/logo-01.png" alt="InfinityTech">
					</a>
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="../Vinicio/inicio.php">Inicio</a>							
							</li>

							<li>
								<a href="product.html">Tienda</a>
							</li>
					
							<li>
								<a href="about.html">Nosotros</a>
							</li>

							<li>
								<a href="contact.html">Contacto</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

<!-- ================= CART ================= -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">Your Cart</span>
			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>

		<div class="header-cart-content">
			<p class="stext-102">Your cart is currently empty.</p>
		</div>
	</div>
</div>

<!-- ================= SEARCH MODAL ================= -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
	<div class="container-search-header">
		<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
			<i class="zmdi zmdi-close"></i>
		</button>

		<form class="wrap-search-header flex-w">
			<button class="flex-c-m trans-04">
				<i class="zmdi zmdi-search"></i>
			</button>
			<input class="plh3" type="text" placeholder="Search products...">
		</form>
	</div>
</div>

<!-- ================= SLIDER ================= -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url('../assets/images/bannerLaptop1.jpg');">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30">
						<span class="ltext-202 cl2">Latest Technology</span>
						<h2 class="ltext-104 cl2 p-t-19 p-b-43">New Devices</h2>
						<a href="product.html"
							class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15">
							Shop Now
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src='../assets/images/Monitores.jpg' alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Monitores
								</span>

								<span class="block1-info stext-102 trans-04">
									
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Ver Monitores
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w" style='width: 88%;'>
						<img src='../assets/images/Ofertas.jpg' alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">

								</span>

								<span class="block1-info stext-102 trans-04">
									
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Ver Ofertas
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src='../assets/images/Mouse.jpg' alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Perifericos
								</span>

								<span class="block1-info stext-102 trans-04">
								
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Ver
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- ================= FOOTER ================= -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<p class="stext-107 cl6 txt-center">
			© 2026 InfinityTech. All rights reserved.
		</p>
	</div>
</footer>

<!-- ================= JS ================= -->
<script src="../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../assets/vendor/animsition/js/animsition.min.js"></script>
<script src="../assets/vendor/bootstrap/js/popper.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/slick/slick.min.js"></script>
<script src="../assets/js/main.js"></script>

</body>
</html>

