$(document).ready(function () {

    $("#ParamsTable").kendoGrid({
        DataSource: {
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
        //detailInit: detailInit,
        columns: [
            { field: "ID_PARAMETRO", title: "Código" },
            { field: "DESCRIPCION", title: "Descripción" },
            { field: "FECHA_MODIFICACION", title: "Fecha Modificación" }
        ]
    });
});

