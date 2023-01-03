$(document).ready(function () {
	
});

function send_whatsapp_offer(vPhone, vOfferInformation)
{
    var link = "https://wa.me/52" + vPhone + "?text=Me gustaría pedir informes sobre el paquete *" + vOfferInformation + "*";
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