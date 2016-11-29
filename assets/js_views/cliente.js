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
        animation: { }
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
    $("#TIPO_VIVIENDA").kendoDropDownList({
        filter: "startswith",
        dataTextField: "DESCRIPCION",
        dataValueField: "ID_VALOR",
        dataSource: {
            type: "JSON",
            serverFiltering: false,
            transport: {
                read: {
                   url: "Cliente/GetTypeHouse",
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
        TransportObject.DOC_CLIENTE = 0;
        TransportObject.CIUDAD_ID = 0;
        TransportObject.NOMBRES = "";
        TransportObject.APELLIDOS= "";
        TransportObject.DIRECCION= "";
        TransportObject.BARRIO= "";
        TransportObject.TELEFONO= "";
        TransportObject.CELULAR= "";
        TransportObject.TIPO_VIVIENDA = 0;
        TransportObject.CANT_ADULTOS= 0;
        TransportObject.CANT_NINIOS= 0;
        TransportObject.CANT_TER_EDAD= 0;
        TransportObject.EDAD_NINIOS= "";
        TransportObject.OFERTA_SALARIO= "";
        TransportObject.DIAS_DESCANSO= "";
        TransportObject.MASCOTAS= "";
        TransportObject.HORARIO= "";
        TransportObject.REQUERIMIENTO= "";
        TransportObject.CORREO_PERSONAL= "";
        TransportObject.CORREO_CORPORATIVO  = "";
        TransportObject.EMPRESA_CONTRATANTE = "";
        TransportObject.HARCK_OBSERVACIONES= "";
        TransportObject.OBSERVACIONES= "";
    }else{
        var grid = $("#ClientGrid").data("kendoGrid");
        var data = grid.dataItem(grid.select());
        if (data === null) {
            alert("No ha Seleccionado Ningun registro para editar");
            return;
        }
        TransportObject = new kendo.data.ObservableObject(data);
    }
    //Habilitamos tab
    var tabStrip = $("#tabs").kendoTabStrip().data("kendoTabStrip");
    tabStrip.enable(tabStrip.tabGroup.children().eq(1), true);
    tabStrip.select(1);
    //Bind Al Form
    kendo.bind($("#form"), TransportObject);
}

function SaveClient(){
    var validator = $("#form").kendoValidator().data("kendoValidator");
    event.preventDefault();
    if (validator.validate()) {
        PostData("Cliente/saveClient", { data: TransportObject.toJSON()}, 
        function(response){ 
            console.log(response);
        }, true);
    
    }
}