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
                <label for="DOC_EMPLEADO" class="control-label">Nro. Documento</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="DOC_CLIENTE" name="DOC_EMPLEADO" placeholder="Identificación" >
            </div>
            <div class="col-sm-2">
                <label for="CIUDAD_ID" class="control-label">Ciudad</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control k-dropdown" id='CIUDAD_ID' name='CIUDAD_ID'>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="NOMBRES" class="control-label">Nombres</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="NOMBRES" placeholder="Nombres Completos" name="NOMBRES">
            </div>
            <div class="col-sm-2">
                <label for="APELLIDOS" class="control-label">Apellidos</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos Completos" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="DIRECCION" class="control-label">Dirección</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="DIRECCION" placeholder="Dirección" name="DIRECCION">
            </div>
            <div class="col-sm-2">
                <label for="CELULAR" class="control-label">Fecha nacimiento</label>
            </div>
            <div class="col-sm-4">
                <input type="text" id='FECHA_NACIMIENTO' class="form-control k-textbox "  name="FECHA_NACIMIENTO" placeholder="Fecha nacimiento" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <label for="TELEFONO" class="control-label">Télefono</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="TELEFONO" placeholder="Tel" name="TELEFONO">
            </div>
            <div class="col-sm-2">
                <label for="E_MAIL" class="control-label">Correo Elecctronico</label>
            </div>
            <div class="col-sm-4">
                <input type="email" class="form-control k-textbox" id="TELEFONO" placeholder="Correo Electronico" name="E_MAIL">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <label for="ESTADO_CIVIL" class="control-label">Estado Civil</label>
            </div>
            <div class="col-sm-4">
                <select class="k-widget k-dropdown k-header form-control" id="ESTADO_CIVIL">
                    <option>Soltero/a</option>
                    <option>Comprometido/a</option>
                    <option>Casado/a</option>
                    <option>Divorciado/a</option>
                    <option>Viudo/a</option>
                </select>
            </div>
            <div class="col-sm-2">
                <label for="CANT_HIJOS" class="control-label">Nro. de Hijos</label>
            </div>
            <div class="col-sm-4">
                <input type="number" class="form-control k-textbox" id="CANT_HIJOS" name="CANT_HIJOS" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="NIVEL_ACADEMICO" class="control-label">Nivel Academico</label>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control k-textbox" id="NIVEL_ACADEMICO"  name="NIVEL_ACADEMICO" placeholder="Horario Laboral">
            </div>
            <div class="col-sm-2">
                <label for="TIPO_EMPLEADO" class="control-label">Tipo Empleado</label>
            </div>
            <div class="col-sm-4">
                <select class="k-widget k-dropdown k-header form-control" name="TIPO_EMPLEADO" id="TIPO_EMPLEADO">
                    <option value="1">TIPO 1</option>
                    <option value="1">TIPO 2</option>
                    <option value="1">TIPO 3</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <label for="EMPRESA_CONTRATANTE" class="control-label">Foto</label>
            </div>
            <div class="col-sm-4">
                <input name="RUTA_FOTO" id="Foto" type="file" />
            </div>
            <div class="col-sm-2">
                <label for="CORREO_CORPORATIVO" class="control-label">Huella</label>
            </div>
            <div class="col-sm-4">
                <input name="RUTA_HUELLA" id="Huella" type="file" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
                <label for="OBSERVACIONES" class="control-label">Observaciones</label>
            </div>
            <div class="col-sm-10">
                <textarea class="form-control k-textbox" id="OBSERVACIONES" name="OBSERVACIONES" ></textarea>
            </div>
        </div>

        <div class="buttons-wrap">
            <button class="k-button k-state-default">Cancelar</button>
            <button class="k-button k-state-default"><?= ($sCallMode == 'Crea') ? 'Guardar' : 'Modificar'; ?></button>
        </div>
        </form>
    </section>
</div>
<script src="<?= base_url(); ?>assets/js_views/empleado.js" type="text/javascript"></script>
