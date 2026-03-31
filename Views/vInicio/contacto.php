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

    <!-- ================= CONTACTO ================= -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">

            <div class="text-center p-b-50">
                <h3 class="mtext-111 cl2">
                    Contáctanos
                </h3>

                <p class="stext-113 cl6">
                    En Infinity Tech estamos para ayudarte. Puedes comunicarte con nosotros a través de los siguientes medios.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">

                    <div class="p-4 shadow-sm" style="border-radius: 12px; border: 1px solid #eee;">

                        <!-- EMAIL -->
                        <div class="d-flex align-items-center p-b-30">
                            <img src="../assets/images/icons/gmail.png"
                                alt="Correo"
                                style="width:45px; height:45px; object-fit:contain; margin-right:20px;">

                            <div>
                                <h5 class="mtext-102 mb-1">Correo</h5>
                                <p class="stext-113 cl6 mb-0">correo@infinitytech.com</p>
                            </div>
                        </div>

                        <!-- TELEFONO -->
                        <div class="d-flex align-items-center p-b-30">
                            <img src="../assets/images/icons/telefono.png"
                                alt="Teléfono"
                                style="width:45px; height:45px; object-fit:contain; margin-right:20px;">

                            <div>
                                <h5 class="mtext-102 mb-1">Teléfono</h5>
                                <p class="stext-113 cl6 mb-0">+506 0000-0000</p>
                            </div>
                        </div>

                        <!-- DIRECCION -->
                        <div class="d-flex align-items-center">
                            <img src="../assets/images/icons/direccion.png"
                                alt="Dirección"
                                style="width:45px; height:45px; object-fit:contain; margin-right:20px;">

                            <div>
                                <h5 class="mtext-102 mb-1">Dirección</h5>
                                <p class="stext-113 cl6 mb-0">San José, Costa Rica</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- ================= GIF TECNOLOGIA ================= -->
        <div class="container text-center p-t-20">
            <img src="../assets/images/tecnologiaGif.gif"
                alt="Tecnología"
                style="max-width: 400px; width:100%; height:auto; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,0.2);">
        </div>

    </section>

    <?php MostrarFooter(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>