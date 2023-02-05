class Filtro {

    /* 
    IMPORTANTE:
    #       => se usa para declarar una propiedad como privada
    static  => se usa para hacer un metodo accesible con solo usar el nombre de la clase y el nombre del mismo sin necesidad de instanciar la clase
     */

    #idFiltro;
    /**
     * Filtra los datos de busqueda de una tabla mediante jQuery
     * @param {string} idFiltro - El input para ingresar los datos a filtrar 
     */

    Constructor(idFiltro) {
        this.#idFiltro = idFiltro;
    }

    /**
     * FILTRO DE BUSQUEDA
     * @param {string} idContenedorFiltro - El div que contendra el input de entrada de datos para filtrar
     */

    crear_filtro(idContenedorFiltro) {
        // Contenedor
        let div = document.getElementById(idContenedorFiltro);

        // Crear campo de filtro
        let filtro = document.createElement("input");
        filtro.setAttribute("id", this.#idFiltro);
        filtro.setAttribute("type", "text");
        filtro.setAttribute("Placeholder", "Filtrar busqueda...");
        filtro.classList.add("form-control");
        filtro.classList.add("mt-2");

        // Adjuntar el filtro al inicio del contenedor
        div.prepend(filtro);
    }


    /**
     * FILTRAR DATOS
     * Codigo que filtrar los datos de una tabla solo usando CSS, se recomienda poner a UPPERCASE los textos del 'tbody' de la tabla
     * @param {string} idFiltro - Input que servira de entradad de datos para la busqueda
     * @param {string} idTabla - La idTabla que contiene los datos para buscar
     * @param {string} idContenedorPadre - El 'div' que contiene la idTabla
     */

    filtrar_datos(idContenedorPadre, idTabla) {
        $(`#${this.#idFiltro}`).keyup(function () {

            // RESTAURAR VISIBILIDAD DE LOS DATOS EN CASO DE HABER HECHO UNA BUSQUEDA PREVIA SIN RESULTADOS
            $(`#${idTabla}`).css("display", "table");
            $(`#${idTabla} tbody tr`).css("display", "table-row");
            $(`#${idContenedorPadre} h3`).remove();

            let filtro = $(this).val().toUpperCase();;

            if (filtro != "") {
                // SI HAY REGISTROS LOS MUESTRA
                if ($(`#${idTabla} tbody tr:contains(${filtro})`).length > 0) {
                    $(`#${idTabla} tbody tr:not(:contains(${filtro}))`).css("display", "none")
                } else {
                    // SI NO HAY REGISTROS DA UN AVISO
                    $(`#${idTabla}`).css("display", "none")
                    $(`#${idContenedorPadre}`).append("<h3 style='color:red;text-align:center;margin:50px auto'>Sin resultados que mostrar</h3>")
                }
            } else {
                $(`#${idTabla} tbody tr`).css("display", "table-row")
            }
        })
    }
}


export default Filtro;
