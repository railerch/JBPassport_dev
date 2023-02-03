class Proceso {
    constructor() {
        this.APIurl = "http://jbpassport.hopto.org:9095/jbp_api/api.php";
    }

    /**
     * Metodo dedicado a realizar las consultas de la App
     * En caso de solo realizar consultas el primer parametro se pasa como NULL
     * @param {string} metodo - La accion a ejecutar en la API siendo esta una consulta o un envio de datos
     * @param {string} datosFrm - El ID del formulario que contiene los datos a enviar, este sera mapeado con 'getElementById'
     * @param {function} callback - Funcion con la que se trabajan los datos enviados desde el servidor.
     */

    consultar(datosFrm = null, metodo, callback) {

        // Si hay datos de formulario para enviar se pasan al FormDAta
        let datFrm = datosFrm ? new FormData(document.getElementById(datosFrm)) : new FormData();

        // Metodo a ejecutar en la API
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
}

export default Proceso;
