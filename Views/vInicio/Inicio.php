<?php
include_once "../layout.php";
include_once "../../Controllers/cProductos.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Consultar productos
$productos = ConsultarProductosController();
?>

<!DOCTYPE html>
<html lang="en">

<?php MostrarHead(); ?>

<body class="animsition">

	<?php MostrarHeader(); ?>

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
	<div class="container d-flex justify-content-center my-4">
		<div id="carouselExampleIndicators" class="carousel slide w-75" data-bs-ride="carousel">

			<!-- Indicadores -->
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
			</div>

			<!-- Imágenes -->
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="3000">
					<img src="../assets/images/bannerLogitech.png" class="d-block w-100" alt="Banner Logitech">
				</div>
				<div class="carousel-item" data-bs-interval="3000">
					<img src="../assets/images/bannerSony.png" class="d-block w-100" alt="Banner Sony">
				</div>
				<div class="carousel-item" data-bs-interval="3000">
					<img src="../assets/images/bannerNvidia.png" class="d-block w-100" alt="Banner Nvidia">
				</div>
				<div class="carousel-item" data-bs-interval="3000">
					<img src="../assets/images/combosPcs.png" class="d-block w-100" alt="Combos PCs">
				</div>
			</div>

			<!-- Controles -->
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Anterior</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Siguiente</span>
			</button>
		</div>
	</div>


	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	<!-- ================= PRODUCTOS ================= -->
	<div class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-left p-b-20">Productos Destacados</h3>
				<p class="stext-102 cl3">Descubre nuestra selección de productos de tecnología</p>
			</div>

			<div class="row">
				<?php 
				if (!empty($productos)) {
					foreach ($productos as $producto) {
						echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">';
						echo 	'<div class="block2">';
						echo 		'<div class="block2-pic hov-img0">';
						
						// Mostrar imagen si existe
						if (!empty($producto['IMAGEN'])) {
							echo '<img src="' . htmlspecialchars($producto['IMAGEN']) . '" alt="' . htmlspecialchars($producto['NOMBRE']) . '">';
						} else {
							echo '<img src="../assets/images/placeholder.png" alt="' . htmlspecialchars($producto['NOMBRE']) . '">';
						}
						
						echo 		'</div>';
						echo 		'<div class="block2-txt flex-w flex-t p-t-14">';
						echo 			'<div class="block2-txt-child1 flex-col-l">';
						echo 				'<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2">' . htmlspecialchars($producto['NOMBRE']) . '</a>';
						echo 				'<span class="stext-105 cl3">₡' . number_format($producto['PRECIO'], 2, ',', '.') . '</span>';
						echo 			'</div>';
						echo 			'<div class="block2-txt-child2 flex-r p-t-3">';
						echo 				'<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">';
						echo 					'<img class="icon-heart1" src="../assets/images/icons/heart.png" alt="">';
						echo 					'<img class="icon-heart2" src="../assets/images/icons/heart-filled.png" alt="">';
						echo 				'</a>';
						echo 			'</div>';
						echo 		'</div>';
						echo 	'</div>';
						echo '</div>';
					}
				} else {
					echo '<div class="col-12 text-center">';
					echo 	'<p class="stext-102 cl3">No hay productos disponibles en este momento.</p>';
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>

	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src='../assets/images/Monitores.jpg' alt="IMG-BANNER">

						<a href="product.html"
							class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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

						<a href="product.html"
							class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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

						<a href="product.html"
							class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
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

	<?php MostrarFooter(); ?>