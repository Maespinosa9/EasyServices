$(document).ready(function () {
    $("#CIUDAD_ID").kendoDropDownList({
        filter: "startswith",
        dataTextField: "DESCRIPCION",
        dataValueField: "ID",
        dataSource: {
            type: "JSON",
            serverFiltering: false,
            transport: {
                read: {
                    url: "../../Ciudad/getCiudades"
                }
            }
        }
    });
    $("#ESTADO_CIVIL").kendoDropDownList();
    $("#TIPO_EMPLEADO").kendoDropDownList();
    $("#FECHA_NACIMIENTO").kendoDatePicker();
    $("#Foto").kendoUpload();
    $("#Huella").kendoUpload();

});
