$(function () {
    var $form = $('#login');
    
    var callback = function (data) {
        var errores = '';
        if (data.estado) {
            alert({contenedor: '.post-alert', msj: 'Bienvenido!', lugar: 'prepend', tipo: 'success', tiempo: 2});
            setTimeout(function () {
                window.location.href = 'home';
            }, 2000);
        } else {
            for (var k in  data.errores) {
                if (data.errores.hasOwnProperty(k)) {
                    errores += '<li>' + data.errores[k] + '</li>';
                }
            }
            alert({contenedor: '.post-alert', msj: errores, lugar: 'prepend', tipo: 'warning', tiempo: 2});
        }
    };
    
    
    $form.submit(function (e) {
        sendAjax('POST', 'VerifyLogin', $form.serialize(), callback, true);
        e.preventDefault();
    });

});