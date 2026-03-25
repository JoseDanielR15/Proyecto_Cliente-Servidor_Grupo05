<?php
include_once "../layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Proyecto_Cliente-Servidor_Grupo05/Controllers/TecnicosController.php";
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body class="animsition">

<?php MostrarHeader(); ?>

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../assets/images/bg-01.jpg'); position: relative; overflow: hidden; min-height: 200px;">
        
        <canvas id="networkCanvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></canvas>

        <h2 class="ltext-105 cl0 txt-center" style="position: relative; z-index: 2; pointer-events: none;">
            Mantenimiento de Técnicos
        </h2>
    </section>  

    <section class="bg0 p-t-62 p-b-60">
        <div class="container">
            <div class="p-b-30 flex-w flex-sb-m">
                <h4 class="mtext-105 cl2">
                    Lista de Técnicos Registrados
                </h4>
                <button type="button" class="flex-c-m stext-101 cl0 size-101 bg3 bor1 hov-btn3 p-lr-15 trans-04"
                data-toggle="modal" data-target="#modalTecnico">
                    <i class="zmdi zmdi-plus m-r-5"></i> Agregar Técnico
                </button>
            </div>

        <div class="wrap-table-shopping-cart" style="border: 1px solid #e6e6e6;">
            <table class="table-shopping-cart">
                <tr class="table_head">
                    <th class="column-1 p-l-30">ID</th>
                    <th class="column-2">Nombre Completo</th>
                    <th class="column-3">Especialidad</th>
                    <th class="column-4">Teléfono</th>
                    <th class="column-5" style="width: 25%;!important">Email</th>
                    <th class="column-6" style="width: 25%;!important">Acciones</th>
                </tr>

                <?php
                $listaTecnicos = ConsultarTecnicos();
                if(isset($listaTecnicos) && count($listaTecnicos) > 0) {
                        foreach ($listaTecnicos as $tecnico) {
                            echo '<tr class="table_row">';
                            echo '    <td class="column-1 p-l-30">' . $tecnico["ID_TECNICO"] . '</td>';
                            echo '    <td class="column-2">' . $tecnico["NOMBRE"] . '</td>';
                            echo '    <td class="column-3">' . $tecnico["ESPECIALIDAD"] . '</td>';
                            echo '    <td class="column-4">' . $tecnico["TELEFONO"] . '</td>';
                            echo '    <td class="column-5" style="width: 25%;!important">' . $tecnico["EMAIL"] . '</td>';
                            echo '    <td class="column-6" style="width: 25%;!important">
                                            <div class="flex-w">
                                                <a href="#" class="btn-sm btn-info m-r-10" 
                                                data-toggle="modal" 
                                                data-target="#modalEditarTecnico"
                                                data-id="' . $tecnico["ID_TECNICO"] . '"
                                                data-nombre="' . $tecnico["NOMBRE"] . '"
                                                data-email="' . $tecnico["EMAIL"] . '"
                                                data-telefono="' . $tecnico["TELEFONO"] . '"
                                                data-especialidad="' . $tecnico["ESPECIALIDAD"] . '">
                                                <i class="zmdi zmdi-edit"></i>
                                                </a>

                                                <a href="adminTecnicos.php?EliminarTecnico=true&id=' . $tecnico["ID_TECNICO"] . '" 
                                                    class="btn-sm btn-danger" 
                                                    onclick="return confirm(\'¿Está seguro de que desea inactivar a este técnico? Podrá reactivarlo luego desde la base de datos.\');">
                                                    <i class="zmdi zmdi-power"></i> 
                                                </a>
                                            </div>
                                        </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6" class="text-center p-t-20">No hay técnicos registrados.</td></tr>';
                    }
                    ?>
            </table>

        </div>
    </section>

    
<!-- Modal para agregar los tecnioss -->

    <div class="modal fade" id="modalTecnico" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="p-t-40 p-b-40 p-lr-40">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">Registrar Nuevo Técnico</h4>
                    
                    <form method="POST">
                        <input type="hidden" name="btnInsertarTecnico">

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nombre" placeholder="Nombre Completo" required>
                            <i class="how-pos4 zmdi zmdi-account"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Correo Electrónico" required>
                            <i class="how-pos4 zmdi zmdi-email"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="telefono" placeholder="Número de Teléfono" required>
                            <i class="how-pos4 zmdi zmdi-phone"></i>
                        </div>

                        <div class="bor8 m-b-30 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="especialidad" placeholder="Especialidad (ej. Redes, Laptops)" required>
                            <i class="how-pos4 zmdi zmdi-wrench"></i>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04">
                            Guardar Técnico
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Editar Tecnicos -->

    <div class="modal fade" id="modalEditarTecnico" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="p-t-40 p-b-40 p-lr-40">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">Actualizar Datos del Técnico</h4>
                    
                    <form method="POST">
                        <input type="hidden" name="btnActualizarTecnico">
                        <input type="hidden" id="edit_id" name="id_tecnico">

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="edit_nombre" name="nombre" placeholder="Nombre Completo" required>
                            <i class="how-pos4 zmdi zmdi-account"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" id="edit_email" name="email" placeholder="Correo Electrónico" required>
                            <i class="how-pos4 zmdi zmdi-email"></i>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="edit_telefono" name="telefono" placeholder="Número de Teléfono" required>
                            <i class="how-pos4 zmdi zmdi-phone"></i>
                        </div>

                        <div class="bor8 m-b-30 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" id="edit_especialidad" name="especialidad" placeholder="Especialidad" required>
                            <i class="how-pos4 zmdi zmdi-wrench"></i>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04">
                            Actualizar Técnico
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php MostrarFooter(); ?>
</body>
</html>