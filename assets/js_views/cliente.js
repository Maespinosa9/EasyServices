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
        columns: [{
                field: "id",
                title: "id",
                width: 240
            }, {
                field: "name",
                title: "name"
            }, {
                field: "price",
                title: "price"
            }]
    });
});