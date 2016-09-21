$(document).ready(function () {
    $("#ClientGrid").kendoGrid({
        dataSource: {
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
        selectable: true,
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
    
//    $("#TIPO_VIVIENDA").kendoDropDownList({
//        filter: "startswith",
//        dataTextField: "DESCRIPCION",
//        dataValueField: "ID_VALOR",
//        dataSource: {
//            type: "JSON",
//            serverFiltering: false,
//            transport: {
//                read: {
//                   url: "../cliente/getCiudades",
//                }
//            }
//        }
//    });
LoadData();
}

function LoadData(){
    //All Clients Search
       $.ajax({
        type: "GET",
        url: "Cliente/getClients",
        async: true,
        success: function (data)
        {
            var source = $("#ClientGrid").data("kendoGrid").dataSource;
            source.data(JSON.parse(data));
            $("#ClientGrid").data("kendoGrid").setDataSource(source);
        }
    });
    
}

