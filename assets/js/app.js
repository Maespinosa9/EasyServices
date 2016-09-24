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
        segundos: 2,
        icon: "glyphicon glyphicon-remove",
        id: Math.floor((Math.random() * 10) + 1)
    }, options);
    var tipos = {
        success: '<strong>¡Exito!</strong>',
        info: '<strong>¡Aviso¡</strong>',
        warning: '<strong>¡Advertencia!</strong>',
        danger: '<strong>¡Peligro!</strong>'
    };
    var html = '<div id=' + options.id + ' class="alert alert-'
            + options.tipo + '" role="alert"">'
            + (options.close ? '<button type="button" class="close"  aria-label="cerrar" data-dismiss="alert" aria-hidden="true">' + (options.icon !== "" ? '<i class="' + options.icon + '"></i>' : '') + '</button>' : '')
            + tipos[options.tipo] + ' ' + options.msj + '</div>';
    if (options.reset) {
    }
    if (options.lugar == "append") {
        $(options.contenedor).append(html);
    } else {
        $(options.contenedor).prepend(html);
    }

    if (options.focus) {
    }
    if (options.segundos > 0) {
        setTimeout(function () {
            $('#' + options.id).fadeTo(1000, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, options.segundos * 1000);
    }
}
var sendAjax = function (type, url, data, call_back, async) {
    async = typeof async !== 'undefined' ? async : true;
    var Response = null;
    $.ajax({
        type: type,
        url: url,
        data: data,
        async: async,
        success: function (data)
        {
            if (async) {
                call_back(data);
                Response = {state: true, mensaje: 'Ajax OK'};
            } else {
                Response = data;
            }

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