<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('head.php'); ?>
    <title>JBPassport | Iniciar Sesión</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-3 text-center shadow border rounded p-3">
            <img id="login-logo" class="mb-3" src="img/logo.png" alt="JBPassport" style="max-width:60%">
            <h4 class="text-muted">JBPassport</h4>
            <p class="card-text">Sistema de información y recarga</p>
            <div id="aviso-usuario"></div>
            <div class="mb-3">
                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de usuario" aria-describedby="helpId">
                <input type="password" name="clave" id="clave" class="form-control mt-2" placeholder="Clave" aria-describedby="helpId">
                <button id="login-btn" class="btn btn-secondary mt-3"><i class="icon-login"></i> Iniciar sesión</button>
            </div>
        </div>
    </div>
    <footer>
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>