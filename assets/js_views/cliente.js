var TransportObject;

$(document).ready(function () {
    $("#ClientGrid").kendoGrid({
        dataSource: {
            pageSize: 20
        },
        height: 550,
        groupable: true,
        sortable: true,
        pageable: {
            pageSizes: true
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
    //Inicializamos Tabs:
    $("#tabs").kendoTabStrip({
        animation: { open: { effects: "fadeIn" } }
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
                   url: "Ciudad/getCiudades",
                }
            }
        }
    });
LoadData();
}

function LoadData(){
    //All Clients Search
       $.ajax({
        type: "GET",
        url: "Cliente/getClients",
        async: true,
        success: function (response)
        {
            var source = $("#ClientGrid").data("kendoGrid").dataSource;
            source.data(JSON.parse(response));
            $("#ClientGrid").data("kendoGrid").setDataSource(source);
        }
    });
    
}

function EditClient(isEdit){
    if (!isEdit) {
        TransportObject = new kendo.data.ObservableObject();
        TransportObject.CLIENTE_ID = 0;
        
    }else{
        var grid = $("#ClientGrid").data("kendoGrid");
        var data = grid.dataItem(grid.select());
        if (data == null) {
            alert("No ha Seleccionado Ningun registro para editar");
            return;
        }
        TransportObject = new kendo.data.ObservableObject(data);
        $("#tabs").kendoTabStrip().data("kendoTabStrip").select(1);
    }
    
    kendo.bind($("#form"), TransportObject);
}

