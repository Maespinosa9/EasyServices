/*
 * 06/09/2016
 * Proyecto: EasyServices 
 * Archivo: alertas.js
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Clase de generacion de alertas
 */
var alert = function (options) {
    options = $.extend(true, {
        contenedor: "",
        lugar: "append",
        tipo: 'success',
        msj: "",
        close: true,
        reset: true,
        focus: true,
        closeInSeconds: 0,
        icon: "",
        id: 'default'// despues de 
    }, options);

    var id = 'default';
    var html = '<div id=' + id + ' class="alert alert-' + options.tipo + ' fade in">' + (options.close ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>' : '') + (options.icon !== "" ? '<i class="fa-lg fa fa-' + options.icon + '"></i>  ' : '') + options.msj + '</div>';

    if (options.reset) {
    }

    if (options.lugar == "append") {
        $(options.contenedor).append(html);
    } else {
        $(options.contenedor).prepend(html);
    }

    if (options.focus) {
    }
    if (options.closeInSeconds > 0) {
        setTimeout(function () {
            $('#' + id).remove();
        }, options.closeInSeconds * 1000);
    }
}

