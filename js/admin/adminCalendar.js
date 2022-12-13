$(document).ready(function () {
	$(".contRent").slideUp();
	$(".contMaking").slideUp();
	generalEvents();
});

function generalEvents()
{
}

function ViewSchedule(id)
{
		var idSchedule = id;
		var vUser = "";
		var vPhone = "";
		var vBranch = "";
		var vColor = "";
		var vHour = "";
		var vSize = "";
		var vProduct = "";
		var typeSchedule = "";
		var idTypeSchedule = "0";
		var pathINE = "/assets/images/users/ine/";
		var pathProduct = "/assets/images/users/product/";
		var pathProofAddress = "/assets/images/users/proofAddress/";
		var vAdvance = " $0";

		$.each(JSON_schedule, function(j, schedule){
			if(schedule.idSchedule == idSchedule)
			{
				$.each(JSON_all_user, function(i, user){
					if(schedule.idUser == user.idUser){				vUser = user.vUser;	vPhone = user.vPhone;}
				});
				$.each(JSON_branch, function(i, branch){
					if(schedule.idBranch == branch.idBranch){		vBranch = branch.vBranch;	}
				});
				$.each(JSON_color, function(i, color){
					if(schedule.idColor == color.idColor){			vColor = color.vColor;	}
				});
				$.each(JSON_hour, function(i, hour){
					if(schedule.idHour == hour.idHour){				vHour = hour.vHour;	}
				});
				$.each(JSON_size, function(i, size){
					if(schedule.idSize == size.idSize){				vSize = size.vSize;	}
				});
				$.each(JSON_products, function(i, product){
					if(schedule.idProduct == product.idProduct){	vProduct = product.vProduct;	}
				});
				
				if(schedule.vAdvance != ""){	vAdvance = " $" + schedule.vAdvance; }
				idTypeSchedule = schedule.idTypeSchedule;

				switch(idTypeSchedule)
				{
					case "1":
						typeSchedule = "Renta";
						$(".contSale").slideUp();
						$(".contRent").slideDown();
						$(".contMaking").slideUp();
						$(".contInfo").slideDown();
						break;
					case "2":
						typeSchedule = "Venta";
						$(".contSale").slideDown();
						$(".contRent").slideUp();
						$(".contMaking").slideUp();
						$(".contInfo").slideUp();
						break;
					case "3":
						typeSchedule = "Confección";
						$(".contSale").slideUp();					
						$(".contRent").slideUp();
						$(".contMaking").slideDown();
						$(".contInfo").slideDown();
						
						break;
				}
				$(".hdn_idSchedule").val(idSchedule);
				$(".tituloModal").text("Folio #" + idSchedule);
				$("#name").text(vUser);
				$("#phone").text(vPhone);
				$("#typeSchedule").text(typeSchedule);

				$("#vBranch").text(vBranch);
				$("#vDateCreation").text(schedule.vDateCreation);
				$("#vDateEvent").text(schedule.vDateEvent);
				$("#vDateDelivery").text(schedule.vDateDelivery);
				$("#vProduct").text(vProduct);
				$("#vProductSale").text(vProduct);
				$(".vColor").text(vColor);
				$(".vSize").text(vSize);
				$("#vHour").text(vHour);
				$("#iAge").text(schedule.iAge + " años");
				$("#vMinPrice").text(schedule.vMinPrice);
				$("#vMaxPrice").text(schedule.vMaxPrice);
				$("#vPrice").text(" $" + schedule.vPrice);
				$("#vAdvance").text(vAdvance);

				$("#iStatus option[value='"+schedule.iStatus+"']").attr('checked',true);
				$("#iStatus option[value='"+schedule.iStatus+"']").change();
				$("#iStatus option[value='"+schedule.iStatus+"']").prop('selected', true);
							
				$("#vImageProduct").attr("src",pathProduct + schedule.vImageProduct);
				$("#vImageINE").attr("src",pathINE + schedule.vImageINE);
				$("#vImageAddressProof").attr("src",pathProofAddress + schedule.vImageAddressProof);

				$(".btn_info_schedule").click();
			}
		});
}

function cleanClassError()
{
	$("#txt_vAdvance").removeClass("errorContat");
}

function valCalendar()
{
	cleanClassError();
	var iStatus = $("#iStatus option:selected").val();
	var send = true;

	if($("#txt_vAdvance").val() == "")
	{
		$("#txt_vAdvance").addClass("errorForm");	send = false;
	}

	if(send)
	{ 		
		$(".hdn_iStatus").val(iStatus);
		$(".hdn_vAdvance").val($("#txt_vAdvance").val());
	
		$(".btn_update").click();				
	}
}
function valTeclas(a, b) { if (a == 1) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[A-Za-z0-9\s]|[@]|[.]|[-]|[_]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a === 2) { tecla = (document.all) ? b.keyCode : b.which; if (tecla === 8) { return true } patron = /[0-9]|[/]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 3) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 4) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 5) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 6) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[0-9]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 7) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9]|[ ]|[,]/; te = String.fromCharCode(tecla); return patron.test(te) } else { if (a == 8) { tecla = (document.all) ? b.keyCode : b.which; if (tecla == 8) { return true } patron = /[a-zA-Z0-9áéíóúñ?¿:/)(]|[ ]|[-]|[,]|[.]/; te = String.fromCharCode(tecla); return patron.test(te) } } } } } } } } } function fnValidaTeclas(b, d) { $(d).blur(); $(d).focus(); var a = $(d).val(); switch (parseInt(b)) { case 1: var c = RegExp("[A-Za-z0-9._@-s]+"); a = a.replace(/[^A-Za-z0-9._@-\s]+$/g, ""); break; case 2: var c = RegExp("[0-9/+/s]+"); a = a.replace(/[^0-9/\s]+/g, ""); break; case 3: var c = RegExp("[0-9+/s]+"); a = a.replace(/[^0-9\s]+/g, ""); break; case 4: var c = RegExp("[a-zA-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 5: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚs]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+$/g, ""); break; case 6: var c = RegExp("[0-9.]+"); a = a.replace(/[^0-9.]+/g, ""); break; case 7: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ,\s]+$/g, ""); break; case 8: var c = RegExp("[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,,s]+"); a = a.replace(/[^A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ.,\s]+$/g, ""); break }$(d).val(""); $(d).val(a) };
