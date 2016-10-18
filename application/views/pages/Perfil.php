<div id="EasyContainer" class="EasyContainer">
    <h3><strong>PERFILES</strong></h3>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?= (isset($alerta) ? $alerta : '') ?>
            <div class="alertas">
            </div>
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a href='<?php echo base_url(); ?>perfil/Form/Crea' class="btn">
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
                    read: "<?= base_url() ?>perfil/Datos/"
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
                {field: "ID_PERFIL", title: "ID_PERFIL", hidden: false},
                {field: "NOMBRE", title: "NOMBRE"},
                {field: "DESCRIPCION", title: "DESCRIPCION"},
                {field: "ACTIVO", title: "ACTIVO"},
                {field: "FECHA_CREACION", title: "FECHA_CREACION"}
            ]
        });
        $botonModificar.click(function () {
            var nSelect = getSelectedItem();
            console.log(nSelect);
            if (nSelect === null) {
                alert({contenedor: '.alertas', msj: 'Debe selecionar un registro', lugar: 'prepend', tipo: 'warning', tiempo: 2});
            } else {
                sendPost(sControl + '/Form/Modifica', {ID_PERFIL: nSelect.ID_PERFIL});
            }
        });
    });
</script>
