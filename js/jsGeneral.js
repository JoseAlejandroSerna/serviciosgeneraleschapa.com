
$(document).ready(function () {
	
});

function BtnCotRapida()
{
    var vName = $("#email_name").val();
    var vPhone = $("#email_phone").val();
    var vService = $("#email_service option:selected").text();

    var mensaje = "Hola mi nombre es *" + vName + "* y me gustaria realizar una cotizacion de " + vService;

	var link = "https://wa.me/52" + vPhone + "?text=" + mensaje;
	
    var a = document.createElement('a');
    a.setAttribute("href", link);
    a.setAttribute("target", "_blank");

    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	
    if (/iPad|iPhone|iPod/.test(userAgent)) {
        var dispatch = document.createEvent("HTMLEvents");
        dispatch.initEvent("click", true, true);
        a.dispatchEvent(dispatch);
    }
    else {
        a.click();
    }
}

function BtnCot()
{
    var vName = $("#cot_name").val();
    var vPhone = $("#cot_phone").val();
    var vSubject = $("#cot_subject").val();
    var vMessage = $("#cot_message").val();
    
    var mensaje = "* " + vSubject + " * Hola mi nombre es *" + vName + "* : " + vMessage;

	var link = "https://wa.me/52" + vPhone + "?text=" + mensaje;
	
    var a = document.createElement('a');
    a.setAttribute("href", link);
    a.setAttribute("target", "_blank");

    var userAgent = navigator.userAgent || navigator.vendor || window.opera;
	
    if (/iPad|iPhone|iPod/.test(userAgent)) {
        var dispatch = document.createEvent("HTMLEvents");
        dispatch.initEvent("click", true, true);
        a.dispatchEvent(dispatch);
    }
    else {
        a.click();
    }
}

function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
