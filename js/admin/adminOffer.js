$(document).ready(function () {
});

function Edit(id)
{
	$.each(JSON_offer,function(i,val){
		if(val.idOffer == id)
		{
			$("#title_edit").val(val.vOffer);
			$("#description_edit").val(val.iPrice);

			$(".hdnId_update").val(id);
			
			$(".btnEdit").click();
		}
	});	
}

function valEdit()
{
	var send = true;

	if($("#title_edit").val() == "" || $("#description_edit").val() == "")
	{
		send = false;
		$(".messageError").text("Actualice la información por favor");
	}

	if(send)
	{
		$(".btn_update").click();
	}
}

function valNew()
{
	var send = true;

	if($("#title_new").val() == "")
	{
		send = false;
		$(".messageError").text("Ingrese el nombre del paquete");
	}
	else if( $("#description_new").val() == "")
	{
		send = false;
		$(".messageError").text("Ingrese el precio del paquete.");
	}

	if(send)
	{
		$(".btn_create").click();						
	}
}

function Delete(id)
{
	$(".hdnId_delete").val(id);
	$(".btnDelete").click();
}
