// =============================== MODULO DE FUNCIONES

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

export function aviso_usuario(tipo, mensaje, duracion, preloader = false, redireccion = false, redireccionUrl = null) {
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
/**
 * Imagen GIF que se muestra mientras se reciben los datos
 * @param {string} idPreloaderDiv 
 */

export function mostrar_preloader(idPreloaderDiv) {
    // Mostrar preloader
    document.getElementById(idPreloaderDiv).innerHTML = "<div class='d-flex justify-content-center' style='height:30vh'> <img class='align-self-center' src='../img/preloader.gif' alt='Preloader.gif'> </div>";
}

export function ocultar_preloader(idPreloaderDiv) {
    document.getElementById(idPreloaderDiv).innerHTML = "";
}

// MOSTRAR VISTA
/**
 * La vista que se debe mostrar segun el usuario que inicie sesión
 * @param {string} tipoVista - Identificador que otorgara el inicio de sesion donde adm (admin) / cli (cliente) 
 * @param {string} vista - La vista que se va a mostrar sea Admin / Client
 * @param {string} usuario - El nombre de usuario de la sesion
 * @param {string} nombre - El nombre completo del usuario
 * @param {string} coVen - El codigo del vendedor en caso de ser necesario
 * @param {string} coCli - El codigo del clliente en caso de ser necesario
 */

export function mostrar_vista(tipoVista, vista, usuario, nombre, coVen, coCli = null) {
    sessionStorage.setItem(`${tipoVista}`, true);
    sessionStorage.setItem("usr", usuario);
    sessionStorage.setItem("usrNam", nombre);
    if (coCli) sessionStorage.setItem("coCli", coCli);
    if (coVen) sessionStorage.setItem("coVen", coVen);
    document.getElementById("sesion-frm-div").style.display = "none";
    aviso_usuario("success", "Iniciando sesión...", 0, true, true, `${vista}.php`);
}

// INICIAR SESION
/**
 * Inicia la sesion y muestra la vista administrativa o de cliente segun sea el caso
 * @param {object} proceso - Instancia de la clase Proceso
 */
export function iniciar_sesion(proceso) {
    proceso.consultar("sesion-frm", null, "iniciar_sesion", res => {
        switch (res.dat.st) {
            case 400:
                document.getElementById("sesion-frm").reset();
                aviso_usuario("danger", "Datos invalidos", 2500);
                break;
            case 1:
                // Permitir acceso a la vista de personal administrativo
                mostrar_vista("adm", "jbp-admin", res.dat.usr, res.dat.nam, res.dat.coVen);
                break;
            case 2:
                // Permitir acceso a la vista de personal cliente
                mostrar_vista("cli", "jbp-client", res.dat.usr, res.dat.nam, res.dat.coVen, res.dat.coCli);
                break;
        }
    })
}

