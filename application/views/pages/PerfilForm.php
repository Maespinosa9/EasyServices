<div id="example" class="container" style="opacity: 1; visibility: visible;">
    <section class="well">
        <h2 class="ra-well-title"><?= $sTitulo ?></h2>
        <hr>
        <?php
        switch ($sCallMode) {
            case false:
                echo '<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" >';
                break;
            case 'Crea':
                echo '<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="' . base_url() . $sControlador . '/Crea">';
                break;
            case 'Modifica':
                echo '<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="' . base_url() . $sControlador . '/Modifica">';
                break;
        }
        ?>
        <div class="form-group">
            <div class="col-sm-2">
                <label class="control-label" for="NOMBRE">NOMBRE</label>
            </div>
            <div class="col-sm-4">
                <input value='<?= isset($arrDatos[0]->NOMBRE) ? $arrDatos[0]->NOMBRE : '' ?>' class="form-control  k-textbox" name="NOMBRE" id="NOMBRE" placeholder="NOMBRE" type="text">
                <input class="hidden" name="ID_PERFIL" type="text" value="<?= ($sCallMode != 'Crea') ? $arrDatos[0]->ID_PERFIL : '' ?>">
            </div>
            <div class="col-sm-2">
                <label class="control-label" for="DESCRIPCION">DESCRIPCIÓN</label>
            </div>
            <div class="col-sm-4">
                <input value='<?= isset($arrDatos[0]->DESCRIPCION) ? $arrDatos[0]->DESCRIPCION : '' ?>' class="form-control  k-textbox" name="DESCRIPCION" id="DESCRIPCION" placeholder="DESCRIPCIÓN" type="text">
            </div>
        </div>
        <?php if ($sCallMode != 'Crea') { ?>
            <div class="form-group">

                <div class="col-sm-2">
                    <label class="control-label" for="ESTADO">ESTADO</label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control  k-select" name="ACTIVO">
                        <option <?= ($arrDatos[0]->ACTIVO == 1) ? 'selected' : '' ?> value="1">ACTIVO</option>
                        <option <?= ($arrDatos[0]->ACTIVO == 0) ? 'selected' : '' ?> value="0">INACTIVO</option>
                    </select>
                </div>
            </div>

        <?php } ?>
        <div class="buttons-wrap">
            <a class="k-button k-state-default" href="javascript:history.back()">Cancelar</a>
            <button class="k-button k-state-default"><?= ($sCallMode == 'Crea') ? 'Guardar' : 'Modificar'; ?></button>
        </div>
        </form>
        <hr>
        <div class="row">
            <div class="form-group">

                <div class="col-sm-2">
                    <label class="control-label" for="MODULO">MODULO</label>
                </div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <select class="form-control  k-select" name="ACTIVO">
                            <option <?= ($arrDatos[0]->ACTIVO == 1) ? 'selected' : '' ?> value="1">ACTIVO</option>
                            <option <?= ($arrDatos[0]->ACTIVO == 0) ? 'selected' : '' ?> value="0">INACTIVO</option>
                        </select>
                        <span class="input-group-btn">
                            <button id="Asociar" class="btn btn-default" type="button">Asociar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="table" data-control='<?= $sControlador ?>'></div>
    </section>
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
        $('#Asociar').click(function () {
            $('#table').data('kendoGrid').dataSource.read();
            $('#table').data('kendoGrid').refresh();
//            sendPost(sControl + '/Form/Modifica', {ID_PERFIL: nSelect.ID_PERFIL});
        });
    });
</script>


