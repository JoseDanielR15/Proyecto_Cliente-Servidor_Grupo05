<?php
include_once "../layout.php";
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
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url('../assets/images/bannerLaptop1.jpg');">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<span class="ltext-202 cl2" style="color: #fff;">Latest Technology</span>
							<h2 class="ltext-104 cl2 p-t-19 p-b-43" style="color: #fff;">New Devices</h2>
							<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15">
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