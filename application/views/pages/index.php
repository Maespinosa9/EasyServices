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
                <div class="row post-alert">
                    <div class="col-md-5" >
                        <a href="#"><img src=" http://placehold.it/280x65" /></a><br>
                        <a href="#"><img src=" http://placehold.it/280x65" /></a><br>
                        <a href="#"><img src=" http://placehold.it/280x65" /></a>
                    </div>
                    <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                        <form id='login' action="verifylogin" method="post" accept-charset="utf-8">
                            <fieldset>
                                <label for="" class="control-label">Usuario</label>
                                <input id="textinput" required name="usuario" type="text" placeholder="Ingrese su usuario" class="form-control input-md">
                                <label for="" class="control-label">Contraseña</label>
                                <input id="textinput" required name="contraseña" type="password" placeholder="Ingrese su contraseña" class="form-control input-md">
                                <button  class="btn btn-info btn-sm pull-right">Iniciar sesión</button>
                                <div class="spacing">
                                    <a href="#"><small> Olvidaste tu contraseña?</small></a>
                                </div>
                                <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
                                <small> Recordar la sesión</small>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p><a href="https://www.easyservices.com">Información</a> · 2016</p>
    </div>
    <script src="<?= base_url(); ?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/js_views/login.js" type="text/javascript"></script>
</body>