<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('America/Caracas');

// INICIAR SESION
if (@$_GET['iniciarSesion']) {
    $usuario = strtolower($_POST['usuario']);
    $clave = $_POST['clave'];

    switch ($usuario) {
        case 'admin':
            if ($clave == 123456) {
                $_SESSION['admin'] = true;
                echo json_encode(['res' => 1]);
            } else {
                echo json_encode(['res' => 0]);
            }
            break;
        case 'ejecutivo':
            if ($clave == 123) {
                $_SESSION['ejecutivo'] = true;
                echo json_encode(['res' => 2]);
            } else {
                echo json_encode(['res' => 0]);
            }
            break;
        default:
            echo json_encode(['res' => 0]);
            break;
    }

    exit();
}

// CERRAR SESION
if (@$_GET['cerrarSesion']) {
    $_SESSION['admin'] = $_SESSION['ejecutivo'] = NULL;
    header('location: login.php');
    exit();
}
