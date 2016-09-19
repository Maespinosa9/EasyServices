$(document).ready(function () {
    $("#table").kendoGrid({
        dataSource: {
            type: "JSON",
            transport: {
                read: "cliente/get"
            },
            pageSize: 20
        },
        height: 550,
        groupable: true,
        sortable: true,
        pageable: {
            refresh: true,
            pageSizes: true,
            buttonCount: 5
        },
        columns: [
            {field: "DOC_CLIENTE", title: "Identificación", width: 240},
            {field: "NOMBRE", title: "Nombre"},
            {field: "CIUDAD", title: "Ciudad"},
            {field: "DIRECCION", title: "Dirección"},
            {field: "TELEFONO", title: "Teléfono"},
            {field: "CELULAR", title: "Celular"},
            {field: "OFERTA_SALARIO", title: "Oferta Salarial"},
            {field: "REQUERIMIENTO", title: "Requerimiento"}
        ]
    });
    
    LoadForm();
    
});

function LoadForm(){
    $("#CIUDAD_ID").kendoDropDownList({
        filter: "startswith",
        dataTextField: "DESCRIPCION",
        dataValueField: "ID",
        dataSource: {
            type: "JSON",
            serverFiltering: false,
            transport: {
                read: {
                   url: "../Ciudad/getCiudades",
                }
            }
        }
    });
}