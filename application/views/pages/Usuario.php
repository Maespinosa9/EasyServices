<div id="EasyContainer" class="EasyContainer">
    <h3><strong>USUARIOS</strong></h3>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?= (isset($alerta) ? $alerta : '') ?>
            <div class="alertas">
            </div>
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a href='<?php echo base_url(); ?>usuario/Form/Crea' class="btn">
                        <img  src="<?php echo base_url(); ?>/assets/image/add.jpg" class="img-rounded img-header"  />
                    </a>
                    <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\edit.jpg" class="img-rounded img-header btn-formulario-modificar"/></a>
                    <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\delete.jpg" class="img-rounded img-header"/></a>
                </div>
                <div id="table" data-control='<?= $sControlador ?>'></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#table").kendoGrid({
            dataSource: {
                transport: {
                    read: "<?= base_url() ?>usuario/Datos/"
                },
                pageSize: 20
            },
            selectable: true,
            height: 550,
            groupable: true,
            sortable: true,
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            columns: [
                {field: "DOCUMENTO", title: "DOCUMENTO"},
                {field: "NOMBRES", title: "NOMBRES"},
                {field: "APELLIDOS", title: "APELLIDOS"},
                {field: "E_MAIL", title: "E_MAIL"},
                {field: "LOGIN", title: "LOGIN"},
                {field: "TELEFONO", title: "TELEFONO"}
            ]
        });
        $botonModificar.click(function () {
            var nSelect = getSelectedItem();
            if (nSelect === null) {
                alert({contenedor: '.alertas', msj: 'Debe selecionar un registro', lugar: 'prepend', tipo: 'warning', tiempo: 2});
            } else {
                sendPost(sControl + '/Form/Modifica', {DOCUMENTO: nSelect.DOCUMENTO});
            }
        });
    });
</script>
