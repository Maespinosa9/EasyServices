<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
<link href="<?= base_url(); ?>assets/css/login.css" rel="stylesheet" type="text/css"/>
<body>
    <div class="middlePage">
        <div class="page-header">
            <h1 class="logo">EasyServices<small> Bienvenido!</small></h1>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Por favor iniciar sesión</h3>
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Alerta!</strong><?= validation_errors('<li>', '</li>'); ?>
                    </div>

                    <div class="col-md-5" >
                        <a href="#"><img src=" http://placehold.it/280x65" /></a><br/>
                        <a href="#"><img src=" http://placehold.it/280x65" /></a><br/>
                        <a href="#"><img src=" http://placehold.it/280x65" /></a>
                    </div>
                    <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                        <?= form_open('verifylogin'); ?>
                        <form id="login">
                            <fieldset>
                                Usuario
                                <input id="textinput" name="usuario" type="text" placeholder="Ingrese su usuario" class="form-control input-md">
                                Contraseña
                                <input id="textinput" name="contraseña" type="password" placeholder="Ingrese su contraseña" class="form-control input-md">
                                <div class="spacing"><a href="#"><small> Olvidaste tu contraseña?</small></a><br/></div>
                                <div class="spacing"><input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"><small> Recordar la sesión</small></div>

                                <button id="singlebutton" name="singlebutton" class="btn btn-info btn-sm pull-right">Iniciar sesión</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p><a href="https://www.easyservices.com">Información</a> · 2016</p>
    </div>
</body>