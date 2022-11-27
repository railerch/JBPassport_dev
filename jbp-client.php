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
    <title>JBPassport | Cliente</title>
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
            <h3 id="tipo-usuario"><i class="icon-user"></i>ID Cliente: <span id="id-usuario">32563</span></h3>
            <hr>

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
                    <!-- Informacion de interes  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#informacion-interes" aria-expanded="true" aria-controls="collapseOne">
                                <h4><i class="icon-info-circled"></i> Información de interes </h4>
                            </button>
                        </h2>
                        <div id="informacion-interes" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#registros-tbl">
                            <div class="accordion-body">

                                <p class="mt-3 mb-1"><b>Dirección de pagos</b></p>
                                <hr class="mt-0">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ea aliquam numquam rem eos ipsam, laboriosam quaerat architecto! Est, delectus.</p>

                                <p class="mt-3 mb-1"><b>Noticias</b></p>
                                <hr class="mt-0">

                                <!-- Noticias -->
                                <div class="card mb-2">
                                    <div class="card-body d-flex p-0 py-2">
                                        <div class="col-3">
                                            <img class="card-img-top" src="img/logo01.png" alt="Title">
                                        </div>
                                        <div class="col-9 text-muted p-2">
                                            <h4 class="card-title">Noticia 1</h4>
                                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-2">
                                    <div class="card-body d-flex p-0 py-2">
                                        <div class="col-3">
                                            <img class="card-img-top" src="img/logo01.png" alt="Title">
                                        </div>
                                        <div class="col-9 text-muted p-2">
                                            <h4 class="card-title">Noticia 2</h4>
                                            <p class="card-text">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                Odit repudiandae eum porro quod laborum veritatis.
                                            </p>
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
        </main>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>