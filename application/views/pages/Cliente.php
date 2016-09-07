<div id="EasyContainer" class="EasyContainer">
    <h3><strong>CLIENTES</strong></h3>
    <div class="prueba">
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a href='<?php echo base_url(); ?>Cliente/EditClient' class="btn">
                        <img  src="<?php echo base_url(); ?>\assets\image\add.jpg" class="img-rounded img-header"  />
                    </a>
                    <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\edit.jpg" class="img-rounded img-header"/></a>
                    <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\delete.jpg" class="img-rounded img-header"/></a>
                </div>
                <div id="table"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        alert(
                {contenedor: 'prueba',
                    msj: 'HOLA PRUEBA'});
        $("#table").kendoGrid({
            dataSource: {
                type: "JSON",
                transport: {
                    read: "<?= base_url() ?>data.json"
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
</script>


