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
    <title>JBPassport | Estado de cuenta</title>
</head>

<body>
    <div id="admin-ui" class="container col-md-6 rounded-bottom py-3 my-md-3">
        <!-- ESTATUS DE CUENTA -->
        <header class="d-flex justify-content-center">
            <div class="col-3">
                <img id="login-logo" class="img-fluid" src="img/logo.png" alt="JBPassport">
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-center">
                <h2>JBPassport</h2>
                <p>Estado de Cuenta de cliente<br>Profit PLUS Movil Access</p>
            </div>
        </header>
        <hr>
        <main class="">
            <h3 id="tipo-usuario">Ejecutivo: <span id="id-usuario">John Doe</span></h3>
            <hr>
            <div class="mb-3">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#clientes"><i class="icon-user"></i> Cliente: <span id="co-cli" class="text-warning">123456</span></button>
            </div>
            <div id="montos" class="rounded mt-3 p-2" style="background-color:lightblue">
                <p class="mb-1"><b>Fecha:</b> <span id="fecha"></span></p>
                <p class="mb-1"><b>Saldo actual:</b> Bs. <span id="saldo-actual-bs">3,459.2</span> | $<span id="saldo-actual-usd">1,250.00</span></p>
                <p class="mb-1"><b>Ultimo pago:</b> <span id="ultimo-pago">Credito 7 días</span></p>
                <!-- Ultimo pago: Prepago, Credito 7 días, Credito 10 días -->
                <p><b>Prepago sugerido:</b> $<span id="prepago-sugerido">125.00</span></p>
            </div>

            <div class="py-3">
                <div class="accordion" id="registros-tbl">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#fuelling-uplift" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-tint"></i> Ultimas recargas</h4>
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
                                                <th>Volumen (gal)</th>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#estatus-financiero" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-money"></i> Ultimos pagos</h4>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="">
                                                <td>12/05/2022</td>
                                                <td>587458965</td>
                                                <td>45.26</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#datos-usuario" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-arrows-cw"></i> Actualizar datos</h4>
                            </button>
                        </h2>
                        <div id="datos-usuario" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div id="aviso-usuario"></div>
                                <div class="mb-3">
                                    <label for="fecha-nac" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="fecha-nac" id="fecha-nac" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="">
                                </div>
                                <button type="button" id="actualizar-datos" class="btn btn-outline-primary"><i class="icon-ok"></i> Actualizar</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cargar-pago" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-dollar"></i> Cargar pago</h4>
                            </button>
                        </h2>
                        <div id="cargar-pago" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <div id="aviso-usuario"></div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Monto a pagar:</label>
                                    <input type="number" class="form-control" step="0.1" min="0" name="monto-pago" id="monto-pago" placeholder="Indique el monto">
                                </div>
                                <button type="button" id="actualizar-datos" class="btn btn-outline-primary"><i class="icon-ok"></i> Aceptar</button>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gestion-jbp" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-cog-alt"></i> Gestion JBP</h4>
                            </button>
                        </h2>
                        <div id="gestion-jbp" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">
                                <h4 id="id-usuario">John Doe</h4>
                                <hr>
                                <div class="mb-3">
                                    <ul class="list-group list-group-numbered">
                                        <li class="list-group-item">Volumen de ventas: <span id="volumen-ventas">525254</span></li>
                                        <li class="list-group-item">Clientes activos: <span id="clientes-activos">65</span></li>
                                        <li class="list-group-item">Rentabilidad: <span id="clientes-activos">?????</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-3">
                    <a href="main-ctrl.php?cerrarSesion=true" id="logout-btn" class="btn btn-outline-primary"><i class="icon-logout"></i> Cerrar sesión</a>
                </div>
            </div>

            <!-- MODAL CLIENTES -->
            <div class="modal fade" id="clientes" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId"><i class="icon-user"></i> Seleccionar cliente</h5>
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
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cerrar</button>
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