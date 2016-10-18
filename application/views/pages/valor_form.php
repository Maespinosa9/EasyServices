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
                <label class="control-label" for="DESCRIPCION">DESCRIPCIÓN</label>
            </div>
            <div class="col-sm-4">
                <input value='<?= isset($arrDatos[0]->DESCRIPCION) ? $arrDatos[0]->DESCRIPCION : '' ?>' class="form-control  k-textbox" name="DESCRIPCION" id="DESCRIPCION" placeholder="DESCRIPCIÓN" type="text">
                <input class="hidden" name="ID_VALOR" type="text" value="<?= ($sCallMode != 'Crea') ? $arrDatos[0]->ID_VALOR : '' ?>">
                <input class="hidden" name="ID_PARAMETRO" type="text" value="<?= ($sCallMode == 'Crea') ? $nParametro : $arrDatos[0]->ID_PARAMETRO; ?>">

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
<script src="<?= base_url(); ?>assets/js_views/empleado.js" type="text/javascript"></script>



