<div id="example" class="container" style="opacity: 1; visibility: visible;">
    <section class="well">
        <h2 class="ra-well-title"><?= $sTitulo ?></h2>
        <div class="alertas">
        </div>
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
                <input class="hidden" id="ID_PERFIL" name="ID_PERFIL" type="text" value="<?= ($sCallMode != 'Crea') ? $arrDatos[0]->ID_PERFIL : '' ?>">
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
                        <select class="form-control  k-select" name="ID_MODULO" id="ID_MODULO">
                        </select>
                        <span class="input-group-btn">
                            <button id="Asociar" class="btn btn-default" type="button">Asociar</button>
                            <button id="Eliminar" class="btn btn-danger" type="button">Eliminar</button>
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
        var callback = function (data) {
            if (data.estado) {
                alert({contenedor: '.alertas', msj: data.mensaje, lugar: 'prepend', tipo: 'success', tiempo: 2});
                $('#table').data('kendoGrid').dataSource.read();
                $('#table').data('kendoGrid').refresh();
            } else {
                alert({contenedor: '.alertas', msj: data.mensaje, lugar: 'prepend', tipo: 'warning', tiempo: 2});
            }
        };
        $("#table").kendoGrid({
            dataSource: {
                transport: {
                    read: "<?= base_url() ?>perfil/Datos_modulo/"
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
                {field: "ID_PERFIL_MODULO", title: "ID_PERFIL_MODULO", hidden: false},
                {field: "NOMBRE_MODULO", title: "NOMBRE_MODULO"}
            ]
        });
        $('#Asociar').click(function () {
            sendAjax("POST", '../AsignaModulo', {'ID_PERFIL': $('#ID_PERFIL').val(), 'ID_MODULO': $('#ID_MODULO').val()}, callback);

//            sendPost(sControl + '/Form/Modifica', {ID_PERFIL: nSelect.ID_PERFIL});
        });
        $("#ID_MODULO").kendoDropDownList({
            filter: "startswith",
            dataTextField: "NOMBRE",
            dataValueField: "ID_MODULO",
            dataSource: {
                type: "JSON",
                serverFiltering: false,
                transport: {
                    read: {
                        url: "../../modulo/datos"
                    }
                }
            }
        });
    });
</script>


