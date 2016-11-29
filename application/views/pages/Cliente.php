
<div id="EasyContainer" class="EasyContainer">
    <div class="prueba">
    
    <div id="tabs">
         <ul>
            <li class="k-state-active">Clientes</li>
            <li class="k-state-disabled">Editar Clientes</li>
         </ul>
        <div>
            <fieldset id="FilterPanel" style="width: 98%;">
                <legend><h3>Clientes</h3></legend>
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <div id="prin">
                        <div id="toolbar" class="btn-group">
                            <a class="btn" onclick="EditClient(false)">
                                <img  src="<?php echo base_url(); ?>\assets\image\add.jpg" class="img-rounded img-header"  />
                            </a>
                            <a class="btn" onclick="EditClient(true)"><img src="<?php echo base_url(); ?>\assets\image\edit.jpg" class="img-rounded img-header"/></a>
                            <a class="btn"><img src="<?php echo base_url(); ?>\assets\image\delete.jpg" class="img-rounded img-header"/></a>
                        </div>
                        <div id="ClientGrid"></div>
                    </div>
                </div>
            </div>
            </fieldset>
        </div>
        <div style="width: 100%">
            <fieldset id="FilterPanel" style="width: 100%;">
            <legend>Creación de Clientes</legend>
            <div id="example" class="container" style="opacity: 1; visibility: visible;">
                <section class="well">
                    <hr>
                    <form class="form-horizontal" id="form" role="form">
                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="DOC_CLIENTE" class="control-label">Nro. Documento</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="DOC_CLIENTE" data-bind="value: DOC_CLIENTE" name="DOC_CLIENTE" placeholder="Identificación" >
                            </div>
                            <div class="col-sm-2">
                                <label for="CIUDAD_ID" class="control-label">Ciudad</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-dropdown" id="CIUDAD_ID" data-bind="value: CIUDAD_ID" name="CIUDAD_ID" >
                            </div>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="NOMBRES" class="control-label">Nombres</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="NOMBRES" data-bind="value: NOMBRES" placeholder="Nombres Completos" name="NOMBRES">
                            </div>
                            <div class="col-sm-2">
                                <label for="APELLIDOS" class="control-label">Apellidos</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="APELLIDOS" data-bind="value: APELLIDOS" name="APELLIDOS" placeholder="Apellidos Completos" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="DIRECCION" class="control-label">Dirección</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="DIRECCION" data-bind="value: DIRECCION" placeholder="Dirección" name="DIRECCION">
                            </div>
                            <div class="col-sm-2">
                                <label for="BARRIO" class="control-label">Barrio</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="BARRIO" data-bind="value: BARRIO" name="BARRIO" placeholder="Barrio" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="TELEFONO" class="control-label">Télefono</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="TELEFONO" data-bind="value: TELEFONO" placeholder="Tel" name="TELEFONO">
                            </div>
                            <div class="col-sm-2">
                                <label for="CELULAR" class="control-label">Celular</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="CELULAR" data-bind="value: CELULAR" name="CELULAR" placeholder="Cel" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="TIPO_VIVIENDA" class="control-label">Tipo de Vivienda</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-dropdown" id="TIPO_VIVIENDA" data-bind="value: TIPO_VIVIENDA"  name="TIPO_VIVIENDA">
                            </div>
                            <div class="col-sm-2">
                                <label for="CANT_ADULTOS" class="control-label">Nro. de Adultos</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="CANT_ADULTOS" data-bind="value: CANT_ADULTOS" name="CANT_ADULTOS" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="CANT_NINIOS" class="control-label">Nro. de Niños</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="CANT_NINIOS" data-bind="value: CANT_NINIOS"  name="CANT_NINIOS">
                            </div>
                            <div class="col-sm-2">
                                <label for="CANT_TER_EDAD" class="control-label">Nro. de 3ra Edad</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="CANT_TER_EDAD" data-bind="value: CANT_TER_EDAD" name="CANT_TER_EDAD" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="EDAD_NINIOS" class="control-label">Edad de los Niños</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="EDAD_NINIOS" data-bind="value: EDAD_NINIOS" name="EDAD_NINIOS" placeholder="Edades separadas por coma (,)">
                            </div>
                            <div class="col-sm-2">
                                <label for="OFERTA_SALARIO" class="control-label">Oferta Salarial</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="OFERTA_SALARIO" data-bind="value: OFERTA_SALARIO" name="OFERTA_SALARIO" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="DIAS_DESCANSO" class="control-label">Dias Descanso</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="DIAS_DESCANSO" data-bind="value: DIAS_DESCANSO"  name="DIAS_DESCANSO" placeholder="Días separados por coma (,)">
                            </div>
                            <div class="col-sm-2">
                                <label for="MASCOTAS" class="control-label">Cant. Mascotas</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="MASCOTAS"  data-bind="value: MASCOTAS" name="MASCOTAS" >
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="HORARIO" class="control-label">Horario</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="HORARIO" data-bind="value: HORARIO"  name="HORARIO" placeholder="Horario Laboral">
                            </div>
                           <div class="col-sm-2">
                                <label for="REQUERIMIENTO" class="control-label">Requerimiento</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-dropdown" id="REQUERIMIENTO" data-bind="value: REQUERIMIENTO"  name="REQUERIMIENTO">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="CORREO_PERSONAL" class="control-label">Correo Personal</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control k-textbox" id="CORREO_PERSONAL" data-bind="value: CORREO_PERSONAL" name="CORREO_PERSONAL" >
                            </div>
                           <div class="col-sm-2">
                                <label for="CORREO_CORPORATIVO" class="control-label">Correo Corporativo</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control k-textbox" id="CORREO_CORPORATIVO" data-bind="value: CORREO_CORPORATIVO"  name="CORREO_CORPORATIVO">
                            </div>
                        </div>
                        <div class="form-group" style="display: flex;">
                            <div class="col-sm-2">
                                <label for="EMPRESA_CONTRATANTE" class="control-label">Empresa Contratante</label>
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control k-textbox" id="EMPRESA_CONTRATANTE" data-bind="value: EMPRESA_CONTRATANTE" name="EMPRESA_CONTRATANTE" >
                            </div>
                           <div class="col-sm-2">
                                <label for="CORREO_CORPORATIVO" class="control-label">Observaciones Harck</label>
                            </div>
                            <div class="col-sm-4">
                                <textarea class="form-control k-textbox" id="HARCK_OBSERVACIONES" data-bind="value: HARCK_OBSERVACIONES" name="HARCK_OBSERVACIONES" ></textarea>
                            </div>
                        </div>

                        <div class="form-group" style="display: flex;">
                           <div class="col-sm-2">
                                <label for="OBSERVACIONES" class="control-label">Observaciones</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea class="form-control k-textbox" id="OBSERVACIONES" data-bind="value: OBSERVACIONES" name="OBSERVACIONES" ></textarea>
                            </div>
                        </div>

                        <div class="buttons-wrap">
                            <button type="button" class="k-button k-state-default">Cancelar</button>
                            <button type="button" class="k-button k-state-default" onclick="SaveClient()">Guardar</button>
                        </div>
                    </form>

                </section>
            </div>
            </fieldset>
        </div>
    </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/js_views/cliente.js" type="text/javascript"></script>


