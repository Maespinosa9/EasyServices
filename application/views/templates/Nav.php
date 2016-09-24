<div class="navbar navbar-default navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?= base_url(); ?>home" class="navbar-brand" ><img  src="<?php echo base_url(); ?>\assets\image\logo.jpg" class="img-rounded"/></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Configuración</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><?= $usuario ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a id="crea_usuario" class="disabled" href="">Administración de  Usuario</a>
                        </li>
                        <li><a id="crea_usuario"  href="http://70.35.200.33/DemoReportes/" target="_blank">Reportes</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="index/cerrar">Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
