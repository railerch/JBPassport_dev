class Proceso {
    constructor() {
        this.APIurl = "http://jbpassport.hopto.org:9095/jbp_api/api.php";
    }

    /**
     * Metodo dedicado a realizar las consultas de la API
     * En caso de solo realizar consultas el primer parametro se pasa como NULL
     * @param {string} idFormulario - El formulario que contiene los datos a enviar (pasar como null si no hay datos)
     * @param {object} datosObj - Datos adicionales para consultar o filtrar en BD (pasar como null si no hay datos)
     * @param {string} metodo - La accion a ejecutar en la API siendo esta una consulta o un envio de datos (obligatorio)
     * @param {function} callback - Funcion con la que se trabajan los datos enviados desde el servidor.
     */

    consultar(idFormulario, datosObj, metodo, callback) {

        // Si hay datos de formulario para enviar se pasan al FormDAta
        let datFrm = idFormulario ? new FormData(document.getElementById(idFormulario)) : new FormData();

        // Agregar los datos adicionales en caso de que existan
        if (datosObj) {
            for (let dat in datosObj) {
                datFrm.append(`${dat}`, `${datosObj[dat]}`);
            }
        }

        // Agregar el metodo a ejecutar en la API
        datFrm.append("met", metodo);

        // Realizar consulta o envio de dartos
        fetch(`${this.APIurl}`, {
            method: "post",
            credentials: "include",
            headers: {
                "Authorization": `Basic ${btoa("JBPassport:Moscow777!!!")}`
            },

            body: datFrm
        })
            .then(res => res.json())
            .then(res => callback(res))
            .catch(err => callback(err))
    }

    /**
     * Metodo que rellena una tabla con los datos de forma ordenada
     * @param {string} idTabla - El ID de la tabla a rellenar (<table id="????"> debe estar vacia</table>)
     * @param {array} cabecera - El array de datos ordenados para la cabecera de la tabla
     * @param {array} datos - Los datos de renglones para la tabla
     */
    modal_tabla_clientes(idTabla, cabecera, datos) {
        let tabla = document.getElementById(idTabla);

        // Crear cabecera
        let thead = document.createElement("thead");
        let trHead = document.createElement("tr");
        cabecera.forEach(col => {
            let th = document.createElement("th");
            th.innerText = col;
            trHead.appendChild(th);
        })
        thead.appendChild(trHead);

        // Crear renglones de registros
        let tbody = document.createElement("tbody");
        datos.forEach(reg => {
            let tr = document.createElement("tr");
            for (let dat in reg) {
                let td = document.createElement("td");
                if (dat == "co_cli" || dat == "cli_des" || dat == "inactivo") {
                    if (dat == "inactivo") {
                        td.style.textAlign = "center";
                        switch (parseInt(reg[dat])) {
                            case 0:
                                td.innerText = "Si";
                                break;
                            case 1:
                                td.innerText = "No";
                                break;
                        }
                    } else {
                        td.innerText = reg[dat].trim();
                    }
                    tr.appendChild(td);
                } else {
                    tr.setAttribute(`data-${dat.replace("_", "-")}`, reg[dat].trim())
                }
            }
            tbody.appendChild(tr);
        })

        tabla.appendChild(thead);
        tabla.appendChild(tbody);
    }
}

export default Proceso;
