<div id="EasyContainer" class="EasyContainer">
    <h3><strong>VALORES PARAMETRICAS</strong></h3>
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <?= (isset($alerta) ? $alerta : '') ?>
            <div class="alertas">
            </div>
            <div id="prin">
                <div id="toolbar" class="btn-group">
                    <a class="btn btn-formulario-añadir-valor" >
                        <img src="<?= base_url(); ?>/assets/image/add.jpg" class="img-rounded img-header"/>
                    </a>
                    <a class="btn btn-formulario-modificar">
                        <img src="<?= base_url(); ?>/assets/image/edit.jpg" class="img-rounded img-header"/>
                    </a>
                    <a class="btn btn-formulario-volver">
                        <img src="<?= base_url(); ?>/assets/image/Devolver.png" class="img-rounded img-header" alt="VOLVER"/>
                    </a>
                </div>
                <div id="table" data-control='<?= $sControlador ?>' data-parametro="<?= $nParametro ?>"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var $botonNuevo = $('.btn-formulario-añadir-valor');
        var $botonVolver = $('.btn-formulario-volver');
        var nParametro = $table.data('parametro');
        $("#table").kendoGrid({
            dataSource: {
                transport: {
                    read: "<?= base_url() ?>valor/Datos/<?= $nParametro ?>"
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
                                    {field: "ID_VALOR", title: "ID", hidden: false},
                                    {field: "ID_PARAMETRO", title: "ID_PARAMETRO", hidden: true},
                                    {field: "DESCRIPCION", title: "DESCRIPCION"},
                                    {field: "ACTIVO", title: "ESTADO"},
                                    {field: "PERSONA_CREACION", title: "PERSONA_CREACION"},
                                    {field: "FECHA_CREACION", title: "FECHA_CREACION"},
                                    {field: "FECHA_MODIFICACION", title: "FECHA_MODIFICACION"}
                                ]
                            });
                            $botonNuevo.click(function () {
                                sendPost('../../' + sControl + '/Form/Crea', {PARAMETRO: nParametro});
                            });
                            $botonVolver.click(function () {
                                document.location.href = '../../parametro';
                            });
                            $botonModificar.click(function () {
                                var nSelect = getSelectedItem();
                                if (nSelect === null) {
                                    alert({contenedor: '.alertas', msj: 'Debe selecionar un registro', lugar: 'prepend', tipo: 'warning', tiempo: 2});
                                } else {
                                    sendPost('../../' + sControl + '/Form/Modifica', {ID_VALOR: nSelect.ID_VALOR});
                                }
                            });
                        });
</script>