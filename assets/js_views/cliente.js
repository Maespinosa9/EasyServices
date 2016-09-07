$(document).ready(function () {
//        alert(
//                {contenedor: '.prueba',
//                    msj: 'HOLA PRUEBA'});
    $("#table").kendoGrid({
        dataSource: {
            //type: "JSON",
//            transport: {
//                read: "<?= base_url() ?>data.json"
//            },
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
            { field: "DOC_CLIENTE", title: "identificación", width: 240},
            { field: "NOMBRE", title: "Nombre"},
            { field: "CIUDAD", title: "Ciudad" },
            { field: "DIRECCION", title: "Dirección" },
            { field: "TELEFONO", tilte: "Teléfono" },
            { field: "CELULAR", title: "CELULAR" },
            { field: ""}
        ]
    });
});