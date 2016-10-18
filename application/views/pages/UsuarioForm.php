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
                <label for="DOCUMENTO" class="control-label">Nro. Documento</label>
            </div>
            <div class="col-sm-4">
                <input value="<?= isset($arrDatos[0]->DOCUMENTO) ? $arrDatos[0]->DOCUMENTO : '' ?>" type="text" class="form-control k-textbox" id="DOCUMENTO" name="DOCUMENTO" placeholder="Identificación" >
            </div>
            <div class="col-sm-2">
                <label for="LOGIN" class="control-label">Login</label>
            </div>
            <div class="col-sm-4">
                <input value="<?= isset($arrDatos[0]->LOGIN) ? $arrDatos[0]->LOGIN : '' ?>" type="text" class="form-control k-textbox" id="LOGIN" name="LOGIN" placeholder="Usuario" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="NOMBRES" class="control-label">Nombres</label>
            </div>
            <div class="col-sm-4">
                <input value="<?= isset($arrDatos[0]->NOMBRES) ? $arrDatos[0]->NOMBRES : '' ?>" type="text" class="form-control k-textbox" id="NOMBRES" placeholder="Nombres Completos" name="NOMBRES">
            </div>
            <div class="col-sm-2">
                <label for="APELLIDOS" class="control-label">Apellidos</label>
            </div>
            <div class="col-sm-4">
                <input  value="<?= isset($arrDatos[0]->APELLIDOS) ? $arrDatos[0]->APELLIDOS : '' ?>" type="text" class="form-control k-textbox" id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos Completos" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="E_MAIL" class="control-label">Correo Electronico</label>
            </div>
            <div class="col-sm-4">
                <input value="<?= isset($arrDatos[0]->E_MAIL) ? $arrDatos[0]->E_MAIL : '' ?>"  type="text" class="form-control k-textbox" id="E_MAIL" placeholder="Correo Electronico" name="E_MAIL">
            </div>
            <div class="col-sm-2">
                <label for="TELEFONO" class="control-label">Telefono</label>
            </div>
            <div class="col-sm-4">
                <input value="<?= isset($arrDatos[0]->TELEFONO) ? $arrDatos[0]->TELEFONO : '' ?>" type="text" id='TELEFONO' class="form-control k-textbox "  name="TELEFONO" placeholder="Telefono" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <label for="ID_PERFIL" class="control-label">Perfil</label>
            </div>
            <div class="col-sm-4">
                <select class="k-widget k-dropdown k-header form-control" id="ID_PERFIL" name="ID_PERFIL">
                </select>
            </div>
            <?php if ($sCallMode != 'Crea') { ?>
                <div class="col-sm-2">
                    <label class="control-label" for="ESTADO">ESTADO</label>
                </div>
                <div class="col-sm-4">
                    <select class="form-control  k-select" name="ACTIVO">
                        <option <?= ($arrDatos[0]->ACTIVO == 1) ? 'selected' : '' ?> value="1">ACTIVO</option>
                        <option <?= ($arrDatos[0]->ACTIVO == 0) ? 'selected' : '' ?> value="0">INACTIVO</option>
                    </select>
                </div>
            <?php } ?>
        </div>
        <div class="buttons-wrap">
            <a class="k-button k-state-default" href="javascript:history.back()">Cancelar</a>
            <button class="k-button k-state-default"><?= ($sCallMode == 'Crea') ? 'Guardar' : 'Modificar'; ?></button>
        </div>
        </form>
    </section>
</div>
<script src="<?= base_url(); ?>assets/js_views/usuario.js" type="text/javascript"></script>
<script>
    $(function () {
        $("#ID_PERFIL").data('kendoDropDownList').value(<?= isset($arrDatos[0]->ID_PERFIL) ? $arrDatos[0]->ID_PERFIL : 0 ?>);
    });
</script>
