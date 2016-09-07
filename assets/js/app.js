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
        tiempo: 0,
        icon: "close",
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
    if (options.tiempo > 0) {
        setTimeout(function () {
            $('#' + id).remove();
        }, options.closeInSeconds * 1000);
    }
}

var sendAjax = function (type, url, data, async) {
    async = typeof async !== 'undefined' ? async : true;
    var Response = null;
    $.ajax({
        type: type,
        url: url,
        data: data,
        async: async,
        success: function (data)
        {
            Response = data;
        }, error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(xhr.responseText);
            console.log(xhr.status);
            console.log(thrownError);
            console.log(ajaxOptions);
            Response = {state: false, mensaje: 'Comuniquese con su administrador, error numero' + xhr.status};
        }
    });
    return Response;
}