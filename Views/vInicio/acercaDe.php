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
    <div class="container d-flex justify-content-center my-4">
        <div id="carouselExampleIndicators" class="carousel slide w-75" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/images/bannerLogitech.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/bannerSony.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/bannerNvidia.png" class="d-block w-100">
                </div>
            </div>

        </div>
    </div>

    <!-- ================= ACERCA DE ================= -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">

            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <h3 class="mtext-111 cl2 p-b-16">
                        ¿Quiénes somos?
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        En <strong>Infinity Tech</strong> somos una plataforma dedicada a ofrecer lo último en tecnología,
                        brindando a nuestros usuarios una experiencia moderna, rápida y confiable. Nuestro objetivo es
                        acercar la innovación a todas las personas, sin importar su nivel de conocimiento tecnológico.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Nacimos como un proyecto enfocado en la pasión por la tecnología y el desarrollo de soluciones
                        digitales, evolucionando hacia una tienda completa donde puedes encontrar desde periféricos
                        hasta equipos de alto rendimiento.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Nos enfocamos en ofrecer productos de calidad, una interfaz amigable y un servicio eficiente,
                        siempre buscando mejorar la experiencia del usuario en cada visita.
                    </p>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="how-bor1">
                        <div class="hov-img0">
                            <img src="../assets/images/Monitores.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Nuestra misión
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Brindar acceso a tecnología de calidad, facilitando la vida de las personas a través de productos
                        innovadores y soluciones digitales accesibles.
                    </p>

                    <h3 class="mtext-111 cl2 p-b-16">
                        Nuestra visión
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Ser una de las plataformas tecnológicas líderes en la región, reconocida por su calidad,
                        innovación y compromiso con sus usuarios.
                    </p>
                </div>

                <div class="order-md-1 col-md-5 col-lg-4 p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="../assets/images/Mouse.jpg" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php MostrarFooter(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>