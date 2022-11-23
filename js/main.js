// Modulo principal
import * as fn from "./main-fn.js";
console.log("Main.JS => Active");
fn.test_fn();

// ========================================= LOGIN
// Ventana login
if (window.location.pathname.includes("login.php")) {
    let loginBtn = document.getElementById("login-btn");
    let claveInp = document.getElementById("clave");

    function iniciar_sesion() {
        let usuario = document.getElementById("usuario").value;
        let clave = document.getElementById("clave").value;

        let data = new FormData();
        data.append("usuario", usuario);
        data.append("clave", clave);

        fetch("main-ctrl.php?iniciarSesion=true", { method: "post", body: data })
            .then(res => res.json())
            .then(res => {
                console.log(res);
                switch (res.res) {
                    case 0:
                        let avisoUsuario = document.getElementById("aviso-usuario");
                        avisoUsuario.innerHTML = "<div class='alert alert-danger' role='alert'> <strong>Error!</strong> Datos invalidos</div >"
                        setTimeout(() => {
                            avisoUsuario.innerHTML = "";
                        }, 2000);
                        break;
                    case 1:
                        window.location.replace("jbp-admin.php");
                        break;
                    case 2:
                        window.location.replace("jbp-client.php");
                        break;
                }
            })
    }

    loginBtn.addEventListener("click", function () {
        iniciar_sesion()
    })

    claveInp.addEventListener("keypress", function (e) {
        console.log(e.key);
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

