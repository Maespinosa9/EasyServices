<?php
$bClose = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>';
switch ($clTipo) {
    case 'alert-success':
        ?>
        <div class="alert alert-success <?= ($bIntermitencia) ? 'alert-dismissable' : '' ?>">
            <?= ($bIntermitencia) ? $bClose : '' ?>
            <strong>Exito! </strong> <?= $sMensaje ?>
        </div>
        <?php
        break;
    case 'alert-danger':
        ?>
        <div class="alert alert-danger <?= ($opciones['bIntermitencia']) ? 'alert-dismissable' : '' ?>">
            <?= ($opciones['bIntermitencia']) ? $bClose : '' ?>
            <strong>Error! </strong> <?= $opciones['sMensaje'] ?>
        </div>
        <?php
        break;
    case 'alert-info':
        ?>
        <div class="alert alert-info <?= ($bIntermitencia) ? 'alert-dismissable' : '' ?>">
            <?= ($bIntermitencia) ? $bClose : '' ?>
            <strong>Información! </strong> <?= $sMensaje ?>
        </div>
        <?php
        break;
    case 'alert-warning':
        ?>
        <div class="alert alert-info <?= ($bIntermitencia) ? 'alert-dismissable' : '' ?>">
            <?= ($bIntermitencia) ? $bClose : '' ?>
            <strong>Advertencia!</strong> <?= $sMensaje ?>
        </div>
        <?php
        break;
}
?>