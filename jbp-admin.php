<?php
session_start();

// VALIDAR INICIO DE SESION
if (!$_SESSION['ejecutivo']) {
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>
    <title>JBPassport | Ejecutivo</title>
</head>

<body>
    <div id="admin-ui" class="container col-md-6 rounded-bottom py-3 my-md-3">
        <!-- ESTATUS DE CUENTA -->
        <header class="text-center mx-auto">
            <img id="logo" class="img-fluid pb-2" src="img/logo.png" alt="JBPassport">
            <p>
                Estado de Cuenta de cliente
                <br>
                Carta CE Servicios Internacionales
            </p>
        </header>
        <hr>
        <main class="">
            <h3 id="tipo-usuario">Ejecutivo: <span id="id-usuario">John Doe</span></h3>
            <hr>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="icon-user"></i> Cliente</span>
                <input id="co-cli" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#clientes" value="" placeholder="Seleccionar cliente" readonly>
            </div>

            <!-- RESUMEN DE CUENTA -->
            <div id="montos" class="rounded mt-3 p-2" style="background-color:lightblue">
                <p class="mb-1"><b>Fecha:</b> <span id="fecha"></span></p>
                <p class="mb-1"><b>Saldo actual:</b> Bs. <span id="saldo-actual-bs">3,459.2</span> | $<span id="saldo-actual-usd">1,250.00</span></p>
                <p class="mb-1"><b>Ultimo pago:</b> <span id="ultimo-pago">Credito 7 días</span></p>
                <!-- Ultimo pago: Prepago, Credito 7 días, Credito 10 días -->
                <p class="mb-1"><b>Pago sugerido:</b> $<span id="prepago-sugerido">125.00</span></p>
                <p class="mb-1"><b>Pago pendiente:</b> $<span id="prepago-sugerido">250.00</span></p>
            </div>

            <!-- TABLAS -->
            <div class="py-3">
                <div class="accordion" id="registros-tbl">
                    <!-- Últimas recargas -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fuelling-uplift" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-tint"></i> Últimas recargas</h4>
                            </button>
                        </h2>
                        <div id="fuelling-uplift" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-dark">
                                        <thead>
                                            <tr>
                                                <th>BLT</th>
                                                <th>Fecha</th>
                                                <th>Localidad</th>
                                                <th>UOM</th>
                                                <th>Tale</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>52365</td>
                                                <td>17/11/2022</td>
                                                <td>La Guaira</td>
                                                <td>350</td>
                                                <td>YV-52365</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ultimos pagos -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#estatus-financiero" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-list-numbered"></i> Últimos pagos</h4>
                            </button>
                        </h2>
                        <div id="estatus-financiero" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-dark">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Referencia</th>
                                                <th>Monto</th>
                                                <th>Tipo pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td>12/05/2022</td>
                                                <td>587458965</td>
                                                <td>45.26</td>
                                                <td>CASH</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Solicitud de combustible -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#solicitud-combustible" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-gauge"></i> Solicitud de combustible</h4>
                            </button>
                        </h2>
                        <div id="solicitud-combustible" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <form id="solicitud-combustible-frm" class="d-grid gap-2">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                    <input type="text" name="empresa" class="form-control" placeholder="Compañia">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                                    <input type="text" name="ruta-vuelo" class="form-control" placeholder="Ruta de vuelo">
                                    <div class="input-group">
                                        <span class="input-group-text">Fecha de vuelo</span>
                                        <input class="form-control" type="date" name="fecha-vuelo" class="form-control" placeholder="Fecha de vuelo">
                                    </div>
                                    <input type="text" name="eta" class="form-control" placeholder="ETA">
                                    <input type="text" name="etd" class="form-control" placeholder="ETD">
                                    <select class="form-select form-select" name="general">
                                        <option selected>General</option>
                                        <option value="">Opcion 01</option>
                                        <option value="">Opcion 02</option>
                                        <option value="">Opcion 03</option>
                                    </select>
                                    <input type="number" name="combustible-estimado" class="form-control" placeholder="Combustible estimado">
                                    <select class="form-select form-select" name="servidio">
                                        <option selected>Tipo de servicio</option>
                                        <option value="">Opcion 01</option>
                                        <option value="">Opcion 02</option>
                                        <option value="">Opcion 03</option>
                                    </select>
                                    <button type="submit" class="btn btn-outline-secondary mt-2"><i class="icon-ok"></i> Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Cargar pago -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cargar-pago" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-money"></i> Cargar pago</h4>
                            </button>
                        </h2>
                        <div id="cargar-pago" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div id="aviso-usuario"></div>
                                <form id="cargar-pago-frm" class="d-grid gap-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Monto a pagar</span>
                                        <input type="number" class="form-control" step="0.1" min="0" name="monto-pago" id="monto-pago" placeholder="0.00">
                                    </div>
                                    <button type="button" id="actualizar-datos" class="btn btn-outline-secondary"><i class="icon-ok"></i> Aceptar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Actualizar datos de cliente -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#datos-usuario" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-id-card"></i> Datos de cliente</h4>
                            </button>
                        </h2>
                        <div id="datos-usuario" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div id="aviso-usuario"></div>
                                <form id="actualizar-datos-frm" class="d-grid gap-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Nombre cliente</span>
                                        <input type="text" class="form-control" name="nombre-cli" id="nombre-cli">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Cedula/RIF</span>
                                        <input type="text" class="form-control" name="cedula-rif" id="cedula-rif">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Dirección</span>
                                        <input type="text" class="form-control" name="direccion" id="direccion">
                                    </div>
                                    <button type="button" id="actualizar-datos" class="btn btn-outline-secondary"><i class="icon-ok"></i> Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- JBP Gestion  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gestion-jbp" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-cog-alt"></i> JBP Gestion </h4>
                            </button>
                        </h2>
                        <div id="gestion-jbp" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <h4 class="text-muted">John Doe</h4>
                                <div class="mb-3">
                                    <p class="mt-3 mb-1"><b>Estadisticas generales</b></p>
                                    <hr class="mt-0">
                                    <p class="mb-1">Clientes: <span id="jbp-clientes">15</span> <i class="icon-eye" data-bs-toggle="modal" data-bs-target="#mis-clientes"></i></p>
                                    <p class="mb-1">Rentabilidad: <span id="jbp-rentabilidad">125.00 3%</span></p>
                                    <p class="mb-1">Volumen de ventas: <span id="jbp-volumen-ventas">25.000</span>gal <span id="jbp-volumen-ventas-porcentaje">21%</span></p>
                                    <p class="mb-1">Gestion terceros: <span id="jbp-gestion-terceros">3:15</span>Hrs <span id="jbp-gestion-terceros-porcentaje">21%</span></p>
                                </div>

                                <div class="mb-3">
                                    <!--
                                    <p class="mb-1">Clientes suspendidos (CS): <span id="jbp-clientes-suspendidos">5</span></p>
                                    <p class="mb-1">Clientes activos (CA): <span id="jbp-clientes-activos">7</span></p>
                                    <p class="mb-1">Clientes inactivos (CI): <span id="jbp-clientes-inactivos">3</span></p>
                                    <p class="mb-1">Clientes morosos (C(-)): <span id="jbp-clientes-morosos">4</span></p>
                                    <p class="mb-1">Clientes con credito (C(+)): <span id="jbp-clientes-saldo-favor">2</span></p>
                                    <p class="mb-1">Gestion terceros: <span id="jbp-gestion-terceros2">3:15</span>Hrs <span id="jbp-gestion-terceros-porcentaje">21%</span></p>
                                    -->
                                    <p class="mt-3 mb-1"><b>Otros datos</b></p>
                                    <hr class="mt-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-dark">
                                            <thead>
                                                <tr>
                                                    <th>Indicador</th>
                                                    <th>Valor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td>Clientes suspendidos</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr class="">
                                                    <td>Clientes activos</td>
                                                    <td>7</td>
                                                </tr>
                                                <tr class="">
                                                    <td>Clientes inactivos</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr class="">
                                                    <td>Clientes con deuda</td>
                                                    <td>4</td>
                                                </tr>
                                                <tr class="">
                                                    <td>Clientes con saldo positivo</td>
                                                    <td>2</td>
                                                </tr>
                                                <tr class="">
                                                    <td>Gestion terceros</td>
                                                    <td>3:15</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CERRAR SESION -->
                <div class="text-center pt-3">
                    <a href="main-ctrl.php?cerrarSesion=true" id="logout-btn" class="btn btn-outline-dark"><i class="icon-logout"></i> Cerrar sesión</a>
                </div>
            </div>

            <!-- MODAL CLIENTES -->
            <div class="modal fade" id="clientes" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document" style="min-width:30%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"><i class="icon-user"></i> Seleccionar cliente</h5>
                        </div>
                        <div class="modal-body">
                            <small id="helpId" class="form-text text-muted"><i class="icon-info-circled"></i> Haga clic en alguno de los registros para cargar los datos.</small>
                            <div class="table-responsive mt-2">
                                <table class="table table-hover table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Cliente</th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="co-cli">
                                            <td>452514</td>
                                            <td>John Doe</td>
                                        </tr>
                                        <tr id="co-cli">
                                            <td>235875</td>
                                            <td>Charles Hill</td>
                                        </tr>
                                        <tr id="co-cli">
                                            <td>415896</td>
                                            <td>Jane Doe</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL MIS CLIENTES-->
            <div class="modal fade" id="mis-clientes" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document" style="min-width:30%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"><i class="icon-user"></i> Mis clientes</h5>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Cliente</th>
                                            <th scope="col">Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="co-cli">
                                            <td>452514</td>
                                            <td>John Doe</td>
                                        </tr>
                                        <tr id="co-cli">
                                            <td>235875</td>
                                            <td>Charles Hill</td>
                                        </tr>
                                        <tr id="co-cli">
                                            <td>415896</td>
                                            <td>Jane Doe</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>