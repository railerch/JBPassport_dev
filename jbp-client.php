<?php
session_start();

// VALIDAR INICIO DE SESION
if (!$_SESSION['cliente']) {
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
    <div id="client-ui" class="container col-md-6 rounded-bottom py-3 my-md-3">
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
            <h3 id="tipo-usuario">Cliente: <span id="id-usuario">00269</span></h3>
            <hr>

            <div id="montos" class="rounded mt-3 p-2">
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
                                            <tr>
                                                <td>8569</td>
                                                <td>14/11/2022</td>
                                                <td>La Guaira</td>
                                                <td>250</td>
                                                <td>YV-87456</td>
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
                </div>

                <div class="text-center pt-3">
                    <a href="main-ctrl.php?cerrarSesion=true" id="logout-btn" class="btn btn-outline-primary"><i class="icon-logout"></i> Cerrar sesión</a>
                </div>
            </div>

        </main>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>