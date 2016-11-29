/*
 * 06/09/2016
 * Proyecto: EasyServices 
 * Archivo: alertas.js
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Clase general de JS
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
    if (options.tiempo > 0) {
        setTimeout(function () {
            $('#' + options.id).fadeTo(1000, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, options.tiempo * 1000);
    }
}
var sendAjax = function (type, url, data, call_back, async) {
    async = (typeof async !== 'undefined' || async === null) ? async : true;
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
function PostData(url, data, sucessMethod) {
    $.ajax({
        url: url,
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: data,
    }).done(function (response) {
            if (sucessMethod == null) {

            } else {
                sucessMethod(response);
            }
        }
        ).fail(function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            console.log(xhr.responseText);
            console.log(xhr.status);
            console.log(thrownError);
            console.log(ajaxOptions);
            Response = {state: false, mensaje: 'Comuniquese con su administrador, error numero' + xhr.status};
    });
}
function GetData(sucessMethod, errorMethod, async) {
    var key = CryptoJS.MD5(CryptoJS.enc.Utf8.parse(Pk()));
    var encrypted = CryptoJS.AES.encrypt(JSON.stringify(GlobalCore.Port), key, {mode: CryptoJS.mode.ECB});
    if (typeof async === 'undefined' || async == null)
        async = true;
    $.ajax({
        url: GlobalCore.Configuration.RestService + "?getData=" + JSON.stringify("0" + encodeURIComponent(encrypted.toString())),
        type: "GET",
        async: async,
        contentType: "application/json; charset=utf-8",
    }).done(function (data) {
        response = JSON.parse(CryptoJS.AES.decrypt(JSON.parse(data), key, {mode: CryptoJS.mode.ECB}).toString(CryptoJS.enc.Utf8));
        if (response.MessageType == 1) {//Sucess!! OK
            if (sucessMethod == null) {

            } else {
                sucessMethod(response.ResponseObject);
            }
        }
        if (response.MessageType == 0 || response.MessageType == 2) {//Business logic error or warning
            if (errorMethod == null) {
                alert(response.Message);
            } else {
                errorMethod(response);
            }
        }
        if (response.MessageType == 3) {//Authorization error
            if (sessionActive) {
                alert(response.Message);
                sessionActive = false;
            }
            Logout();
            return;
        }
    }).fail(function (jqXHR, error) {
        if (jqXHR.status != 0) {
            alert("Ha ocurrido un error en el servidor, consulte a soporte técnico: ");
            if (sessionActive)
                sessionActive = false;
            Logout();
        }
    });
}
var getSelectedItem = function () {
    var grid = $table.data("kendoGrid");
    var selectedItem = grid.dataItem(grid.select());
    return selectedItem;


}
var sendPost = function (sModelo, sParametros) {
    var form = $('<form></form>');
    form.attr("method", "POST");
    form.attr("action", sModelo);
    $.each(sParametros, function (key, value) {
        var field = $('<input></input>');
        field.attr("type", "text");
        field.attr("name", key);
        field.attr("class", 'hidden');
        field.attr("value", value);
        form.append(field);
    });
    $(document.body).append(form);
    form.submit();
    $(document.body).remove(form);

}
var $table = $('#table');
var $botonNuevo = $('.btn-formulario-añadir');
var $botonModificar = $('.btn-formulario-modificar');
var $botonEliminar = $('.btn-formulario-eliminar');
var sControl = $table.data('control');
$(function () {
   
    $botonEliminar.click(function () {
        var nSelect = getSelectedItem();
        if (nSelect === null) {
            alert({contenedor: '.alertas', msj: 'Debe selecionar un registro', lugar: 'prepend', tipo: 'warning', tiempo: 2});
        } else {
            sendPost(sControl + '/Elimina', {ID: nSelect[0].ID});
        }
    });
    $botonNuevo.click(function () {
        sendPost(sControl + '/Form/Crea');
    });


});

