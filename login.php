<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>
    <title>JBPassport | Iniciar Sesión</title>
</head>

<body>
    <!-- FORMULARIO SESION -->
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-3 text-center shadow border rounded p-3" style="background-color:#333;color:#fff">
            <div id="login-header" class="d-flex flex-column justify-content-center align-items-center p-2 mb-3">
                <img id="login-logo" class="mb-3" src="img/logo.png" alt="JBPassport" style="max-width:60%">
                <p class="card-text"><b>Nuestro servicio al alcence de tus manos</b></p>
            </div>
            <div id="aviso-usuario"></div>
            <div class="mb-3">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="ID usuario">
                <input type="password" name="clave" id="clave" class="form-control mt-2" placeholder="Clave">
                <div class="d-grid gap-2">
                    <button id="login-btn" class="btn btn-outline-secondary mt-3"><i class="icon-login"></i> Iniciar sesión</button>
                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#formulario-membresia">Solicitar membresía <b>JBP Passport Club</b></button>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULARIO MEMBRESIA -->
    <!-- Modal trigger button -->
    <div class="modal fade" id="formulario-membresia" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"><i class="icon-user-circle-o"></i> Membresía JBP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-membresia">
                        <p>
                            Únase a nuestro equipo con mas de 2500 miembros con solo rellenar el formulario a continuación.
                            <br>
                            Uno de nuestros ejecutivos lo contactara en la brevedad posible para presentarle nuestros servicios y beneficios.
                        </p>
                        <div class="d-flex flex-wrap d-grid gap-2">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="d-grid mt-3">
                            <button id="membresia-btn" class="btn btn-outline-secondary"><i class="icon-ok"></i> Enviar solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>