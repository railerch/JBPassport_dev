// Modulo principal
import Proceso from "../classes/Proceso.js";
import Filtro from "../classes/Filtro.js";
import * as fn from "./main-fn.js"

// ========================================= VISTA LOGIN
if (window.location.pathname.includes("login.php")) {
    let loginBtn = document.getElementById("login-btn");
    let claveInp = document.getElementById("clave");
    sessionStorage.clear();

    const proceso = new Proceso();

    loginBtn.addEventListener("click", function () {
        fn.iniciar_sesion(proceso)
    })

    claveInp.addEventListener("keypress", function (e) {
        if (e.key == "Enter") fn.iniciar_sesion(proceso);
    })

}

// ========================================= VISTAS ADMIN/CLIENT
if (window.location.pathname.includes("jbp-admin.php") || window.location.pathname.includes("jbp-client.php")) {

    // Fecha
    document.getElementById("fecha").innerText = new Date().toISOString().split("T")[0];

    // Estilo de tablas
    document.querySelectorAll(".table-responsive").forEach(tbl => {
        tbl.style.maxHeight = "300px";
        tbl.style.overflow = "scroll";
        tbl.style.fontSize = "0.7em";
    })

    // Cerrar sesion
    document.getElementById("logout-btn").addEventListener("click", function () {
        window.location.replace("login.php");
    });
}

// ========================================= VISTA ADMIN
if (window.location.pathname.includes("jbp-admin.php")) {
    // NOMBRE DE USUARIO
    document.getElementById("nombre-usuario").innerText = sessionStorage.getItem("usrNam");

    // CONSULTAR CLIENTES DEL VENDEDOR
    document.querySelector("input#cliente").addEventListener("click", function () {
        // Reiniciar campos de datos
        document.getElementById("clientes-totales").innerText = 0;
        document.querySelectorAll("#clientes-tbl, #filtro-busqueda-div").forEach(el => {
            el.innerHTML = "";
        })

        // Mostrar el GIF de carga
        fn.mostrar_preloader("modal-preloader-div");

        // Codigo del vendedor de la sesion:
        // Si el usuario es root no se indicara codigo de vendedor y traera todos los clientes registrados
        let coVen;
        if (sessionStorage.getItem("coVen")) {
            coVen = { coVen: sessionStorage.getItem("coVen") };
        } else {
            coVen = null;
        }

        // Consultar clientes del vendedor
        let clientes = new Proceso();
        clientes.consultar(null, coVen, "consultar_clientes", res => {
            fn.ocultar_preloader("modal-preloader-div");
            switch (res.codigoHTTP) {
                case 200:
                    // Indicar cantidad de clientes
                    document.getElementById("clientes-totales").innerText = res.dat.length;

                    // Crear filtro de busqueda
                    const filtroBusqueda = new Filtro("filtro-busqueda");
                    filtroBusqueda.crear_filtro("filtro-busqueda-div");
                    filtroBusqueda.filtrar_datos("clientes-tbl-div", "clientes-tbl");

                    // Llenar tabla con datos de clientes
                    clientes.modal_tabla_clientes("clientes-tbl", ["Codigo", "Descripción", "Inactivo"], res.dat);

                    // Cargar datos del cliente seleccionado
                    // ???????????????????????
                    // ???????????????????????
                    // ???????????????????????

                    break;
                case 400:
                    // Indicar cantidad de clientes
                    cdocument.getElementById("clientes-totales").innerText = 0;
                    document.getElementById("clientes-tbl").innerHTML = "<p>El vendedor no tiene clientes asignados.</p>"
                    break;
            };
        })
    })
}

// ========================================= VISTA CLIENT
if (window.location.pathname.includes("jbp-client.php")) {

}