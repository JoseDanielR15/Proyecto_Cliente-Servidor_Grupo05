<?php
include_once "../layout.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php MostrarHead(); ?>

<body class="animsition">

<?php MostrarHeader(); ?>

	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../assets/images/bg-01.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Mantenimiento de Técnicos
        </h2>
    </section>  

    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="p-b-30 flex-w flex-sb-m">
                <h4 class="mtext-105 cl2">
                    Lista de Técnicos Registrados
                </h4>
                <a href="fomulario_tecnico.php" class="flex-c-m stext-101 cl0 size-101 bg3 bor1 hov-btn3 p-lr-15 trans-04">
                    <i class="zmdi zmdi-plus m-r-5"></i> Agregar Técnico
                </a>
            </div>

            <div class="wrap-table-shopping-cart" style="border: 1px solid #e6e6e6;">
                <table class="table-shopping-cart">
                    <tr class="table_head">
                        <th class="column-1 p-l-30">ID</th>
                        <th class="column-2">Nombre Completo</th>
                        <th class="column-3">Especialidad</th>
                        <th class="column-4">Teléfono</th>
                        <th class="column-5">Acciones</th>
                    </tr>

                    <tr class="table_row">
                        <td class="column-1 p-l-30">001</td>
                        <td class="column-2">Juan Pérez</td>
                        <td class="column-3">Soporte Redes</td>
                        <td class="column-4">+506 8888-8888</td>
                        <td class="column-5">
                            <div class="flex-w">
                                <a href="editar_tecnico.php?id=001" class="btn-sm btn-info m-r-10" title="Editar">
                                    <i class="zmdi zmdi-edit cl2 hov-cl1"></i>
                                </a>
                                <a href="#" class="btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Seguro que desea eliminar este técnico?')">
                                    <i class="zmdi zmdi-delete cl2 hov-cl1"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>	



<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<?php MostrarFooter(); ?>
