<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>
    <title>JBPassport | Registrarse</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-content-center">
            <div class="col-10 col-md-6 text-center shadow border rounded">
                <i id="login-logo" class="icon-user"></i>
                <h4 class="text-muted">Crear cuenta</h4>
                <div class="mb-3">
                    <input type="text" name="nombre-completo" id="nombre" class="form-control" placeholder="Nombre completo">
                    <input type="text" name="nombre-completo" id="nombre" class="form-control mt-1" placeholder="Nº Cedula">
                    <input type="text" name="nombre-completo" id="nombre" class="form-control mt-1" placeholder="Nombre de usuario">
                    <input type="password" name="clave" id="clave" class="form-control mt-1" placeholder="Clave">
                    <input type="password" name="clave" id="clave-confirmacion" class="form-control mt-1" placeholder="Confirmar clave">
                    <button class="btn btn-primary mt-3"><i class="icon-ok"></i> Crear una cuenta</button>
                </div>
                <p><a href="login.php" target="_self"><i class="icon-login"></i> Iniciar Sesión</a></p>
            </div>
        </div>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>