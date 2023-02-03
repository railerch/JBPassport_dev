// Modulo principal
import Proceso from "../classes/Proceso.js";
console.log("Main.JS => Active");

// ========================================= UTILIDADES
// AVISO AL USUARIO
/**
 * Funcion global dedicada a la generacion de avisos al usuario y redireccion en caso de ser necesario.
 * @param {string} tipo - El tipo de aviso: 'info', 'warning', 'success' o 'error' .
 * @param {string} texto - El mensaje que se mostrara en el aviso.
 * @param {number} duracion - El tiempo durante el cual se muestra el mensaje.
 * @param {boolean} preloader - Valor bool (true, false) que indica si se muestra la imagen gif animada que indica que la accion esta en proceso.
 * @param {boolean} redireccion - Valor bool (true, false) que indica si hay redireccion o no.
 * @param {string} redireccionUrl - La pagina o url de destino en caso de activar la redireccion.
 */

function aviso_usuario(tipo, mensaje, duracion, preloader = false, redireccion = false, redireccionUrl = null) {
    let contenedor = document.getElementById("aviso-usuario");
    let clase = null;
    let titulo = '';
    let preloaderImg = '';
    let display = "none";

    switch (tipo) {
        case 'info':
            clase = "alert-info"
            titulo = "INFO:";
            break;
        case 'warning':
            clase = "alert-warning"
            titulo = "AVISO:";
            break;
        case 'success':
            clase = "alert-success"
            titulo = "EXITO:";
            break;
        case 'danger':
            clase = "alert-danger"
            titulo = "ERROR:";
            preloaderImg = "<i class='icon-attention'></i>";
            break;
    }

    // Activar preloader
    if (preloader) {
        preloaderImg = "<img src='img/preloader.gif' alt='Preloader.gif' style='width:30px;margin-right:10px'></img>";
    }

    // Comportamiento de cierre del aviso
    if (duracion == 0 && !redireccion) {
        // Cerrar el aviso mediante un boton sin redireccion a otra vista de la app
        display = "inline";
    } else if (duracion > 0 && !redireccion) {
        // El aviso se cierra automaticamente luego de un tiempo indicado
        setTimeout(function () {
            contenedor.innerHTML = "";
        }, duracion);
    }

    // Mostrar aviso
    contenedor.innerHTML = `
    <div id="aviso" class="alert ${clase} mt-2" role="alert">   
        ${preloaderImg}<strong>${titulo}</strong> <span id="texto-aviso">${mensaje}</span>
        <button id="cerrar-aviso" class="btn btn-outline-secondary btn-sm" style="display:${display}">Cerrar</button>
        </div>`;

    // Cerrar alerta al hacer clic en el boton cerrar
    if (display == "inline") {
        document.getElementById("cerrar-aviso").addEventListener("click", function () {
            contenedor.innerHTML = "";
        })
    }

    // Activar la redireccion
    if (redireccion) {
        setTimeout(() => {
            window.location.replace(redireccionUrl);
        }, 2000);
    }
}

// PRELOADER
function mostrar_preloader() {
    // Mostrar preloader
    document.getElementById("preloader-div").innerHTML = "<div class='d-flex justify-content-center' style='height:30vh'> <img class='align-self-center' src='public/img/preloader.gif' alt='Preloader.gif'> </div>";
}

function ocultar_preloader() {
    document.getElementById("preloader-div").innerHTML = "";
}

// ========================================= LOGIN
// Ventana login
if (window.location.pathname.includes("login.php")) {
    let loginBtn = document.getElementById("login-btn");
    let claveInp = document.getElementById("clave");
    sessionStorage.clear();

    function iniciar_sesion() {
        const proceso = new Proceso();
        proceso.consultar("sesion-frm", "iniciar_sesion", res => {
            console.log(res.res.st);
            switch (res.res.st) {
                case 400:
                    document.getElementById("sesion-frm").reset();
                    aviso_usuario("danger", "Datos invalidos", 0);
                    break;
                case 1:
                    // Permitir acceso a la vista de personal administrativo
                    sessionStorage.setItem("adm", true);
                    document.getElementById("sesion-frm-div").style.display = "none";
                    aviso_usuario("success", "Iniciando sesión...", 0, true, true, "jbp-admin.php");
                    break;
                case 2:
                    // Permitir acceso a la vista de cliente
                    sessionStorage.setItem("cli", true);
                    document.getElementById("sesion-frm-div").style.display = "none";
                    aviso_usuario("success", "Iniciando sesión...", 0, true, true, "jbp-client.php");
                    break;
            }

        })
    }

    loginBtn.addEventListener("click", function () {
        iniciar_sesion()
    })

    claveInp.addEventListener("keypress", function (e) {
        if (e.key == "Enter") iniciar_sesion();
    })

}

// ========================================= MAIN
// Ventana principal
if (window.location.pathname.includes("jbp-admin.php") || window.location.pathname.includes("jbp-client.php")) {
    // Lado cliente

    // Fecha
    document.getElementById("fecha").innerText = new Date().toISOString().split("T")[0];

    // Estilo de tablas
    document.querySelectorAll(".table-responsive").forEach(tbl => {
        tbl.style.maxHeight = "300px";
        tbl.style.overflow = "scroll";
        tbl.style.fontSize = "0.8em";
    })

    // Cerrar sesion
    document.getElementById("logout-btn").addEventListener("click", function () {
        window.location.replace("login.php");
    });
}

