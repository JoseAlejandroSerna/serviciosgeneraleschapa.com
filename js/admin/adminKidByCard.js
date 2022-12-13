$(document).ready(function () {
});

function Edit(id)
{
	
	$.each(JSON_kidByCard,function(i,val){
		if(val.idKidByCard == id)
		{
			$("#name").val(val.vName);
			$("#age").val(val.iAge);
			$("#iNumberPurchases").val(val.iNumberPurchases);
			$("#iTotalPurchases").val(val.iTotalPurchases);
			$(".hdn_idKidByCard").val(id);
			$(".modalEdit").click();
		}
	});	
}

function valEdit()
{
	$("#name").removeClass("errorContat");
	$("#age").removeClass("errorContat");
	$("#iNumberPurchases").removeClass("errorContat");
	$("#iTotalPurchases").removeClass("errorContat");
	var send = true;

	if( $("#name").val() == "")
	{
		$("#name").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la niña asociada");
	}
	else if( $("#age").val() == "")
	{
		$("#age").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la edad de la niña");
	}
	else if( $("#iNumberPurchases").val() == "")
	{
		$("#iNumberPurchases").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la cantidad de ventas acumuladas");
	}
	else if( $("#iTotalPurchases").val() == "")
	{
		$("#iTotalPurchases").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el total de ventas acumuladas");
	}

	if(send)
	{ 	
		$(".btn_update").click();						
	}
}

function valNew()
{
	$("#name_new").removeClass("errorContat");
	$("#age_new").removeClass("errorContat")
	var send = true;

	if( $("#name_new").val() == "")
	{
		$("#name_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese el nombre de la niña asociada");
	}
	else if( $("#age_new").val() == "")
	{
		$("#age_new").addClass("errorContat");		send = false;
		$(".messageError").text("Ingrese la edad de la niña");
	}

	if(send)
	{ 	
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdn_idKidByCard_delete").val(id);
	$(".modalDelete").click();
}
