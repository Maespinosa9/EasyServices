$(document).ready(function () {
    $("#ID_PERFIL").kendoDropDownList({
        filter: "startswith",
        dataTextField: "DESCRIPCION",
        dataValueField: "ID_PERFIL",
        dataSource: {
            type: "JSON",
            serverFiltering: false,
            transport: {
                read: {
                    url: "../../Perfil/Datos"
                }
            }
        }
    });
});
