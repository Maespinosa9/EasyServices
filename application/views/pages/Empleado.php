<?= print_r($this->session->userdata('alerta')) ?>
<div id="EasyContainer" class="EasyContainer">
    <h3><strong>EMPLEADOS</strong></h3>
    <div class="prueba">
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a href='<?php echo base_url(); ?>Empleado/Form/Crea' class="btn">
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
        $("#table").kendoGrid({
            dataSource: {
                type: "JSON",
                transport: {
                    read: "<?= base_url() ?>Empleado/Datos"
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
            columns: [{field: "DOC_CLIENTE", title: "Identificación", width: 240},
                {field: "NOMBRE", title: "Nombre"},
                {field: "CIUDAD", title: "Ciudad"},
                {field: "DIRECCION", title: "Dirección"},
                {field: "TELEFONO", title: "Teléfono"},
                {field: "CELULAR", title: "Celular"},
                {field: "OFERTA_SALARIO", title: "Oferta Salarial"},
                {field: "REQUERIMIENTO", title: "Requerimiento"}]
        });
    });
</script>



