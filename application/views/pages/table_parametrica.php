<?= (isset($alerta) ? $alerta : '') ?>
<div id="EasyContainer" class="EasyContainer">
    <h3><strong>PARAMETRICAS</strong></h3>
    <div class="prueba">
    </div>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a class="btn btn-formulario" >
                        <img src="<?= base_url(); ?>/assets/image/edit.jpg" class="img-rounded img-header"/>
                    </a>
                    <a class="btn btn-formulario-volver">
                        <img src="<?= base_url(); ?>/assets/image/Devolver.png" class="img-rounded img-header" alt="VOLVER"/>
                    </a>
                </div>
                <div id="table" data-control='<?= $sControlador ?>'></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var $botonHijos = $('.btn-formulario');
        var $botonVolver = $('.btn-formulario-volver');
        $("#table").kendoGrid({
            dataSource: {
                transport: {
                    read: "<?= base_url() ?>parametro/Datos/"
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
                {field: "ID_PARAMETRO", title: "ID", hidden: false},
                {field: "DESCRIPCION", title: "DESCRIPCION"},
                {field: "ESTADO", title: "ESTADO"},
                {field: "FECHA_CREACION", title: "FECHA_CREACION"},
                {field: "USUARIO_CREACION", title: "USUARIO_CREACION"},
                {field: "FECHA_ULTIMA_MOD", title: "FECHA_ULTIMA_MOD"},
                {field: "USUARIO_MOD", title: "USUARIO_MOD"}]
        });
        $botonHijos.click(function () {
            document.location.href = 'valor/index/' + getSelectedItem().ID_PARAMETRO;
        });
        $botonVolver.click(function () {
            document.location.href = 'configuracion';
        });
    });
</script>
